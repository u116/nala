<?php

namespace Src\Controllers;

use Src\Http\Forms\EditForm;
use Src\Models\Validator;

class EditController extends AbstractController
{
    public string $new;
    public string $section;
    public string $received;

    public function __construct()
    {
        parent::__construct();
        $this->section = $this->currentSection();
    }

    public function get(): array
    {
        if (!isset($this->userInfo)) {
            header('Location: /login');
            return (new LoginController)->get();
        }

        return $this->render("edit", [
                'section' => $this->section,
                'content' => $this->getAbout(),
            ]
        );
    }

    public function post(): array
    {
        if ((new EditForm($this->section))->isCorrect()) {
            $this->received = (new EditForm($this->section))->getPostData()['a'];
            if (Validator::about($this->received)) {
                $this->About->edit($this->received, $this->uid);
            }
        } else return (new ResponseController)->httpCodeResponse($this->LoginForm->errorCode);

        return $this->get();
    }

    private function currentSection(): string
    {
        return explode('/', $_SERVER['REQUEST_URI'])[2];
    }

    private function getAbout(): string
    {
        return $this->About->getContent($this->uid);
    }

    private function postAbout()
    {

    }

}