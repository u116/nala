<?php

namespace Src\Controllers;

use Src\Http\Forms\RedirectForm;

class RedirectController extends AbstractController
{
    public ?string $error = null;
    protected RedirectForm $RedirectForm;

    public function __construct()
    {
        parent::__construct();
        $this->RedirectForm = new RedirectForm;
    }

    public function get(string $slug = null): array
    {
        if (isset($slug)) $this->redirect($slug);

        return $this->render('redirect', [
                'redirects' => $this->Redirect->getUserRedirects($this->uid),
                false
            ]
        );
    }

    public function post(): array
    {
        if (!$this->RedirectForm->isCorrect())
            return (new ResponseController)->httpCodeResponse($this->RedirectForm->errorCode);
        else $data = $this->RedirectForm->getPostData();

        if ($this->verifyData($data))
            if ($this->createRedirect($data['n'], $data['u']))
                return $this->get();

        return $this->render('redirect', [
            'error' => $this->error
        ]);

    }

    private function redirect(string $name): void
    {
        // Same query is done twice... TODO: Change this later.
        if ($this->Redirect->exists($name, $this->uid))
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $this->Redirect->getURL($name, $this->uid));
            die();
    }

    private function createRedirect(string $name, string $url): bool
    {
        if ($this->Redirect->exists($name, $this->uid)) {
            $this->error = "Redirect name already exists.";
            return false;
        }

        if ($this->Redirect->create($name, $url, $this->uid))
            return true;

        $this->error = "Sorry, there was an error creating the redirect";
        return false;
    }

    private function verifyData(array $data): bool
    {
        if (empty($data['n'])) {
            $this->error = 'The name field can\'t be empty.';
            return false;
        }

        if (strlen($data['n']) > 50 || strlen($data['n']) < 1) {
            $this->error = 'Please keep the name between 1 and 50 chars.';
            return false;
        }

        if (!filter_var($data['u'], FILTER_VALIDATE_URL)) {
            $this->error = 'The redirect ought to point towards a URL.';
            return false;
        }

        return true;
    }
}