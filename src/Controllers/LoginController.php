<?php

namespace Src\Controllers;

use Src\Http\Forms\LoginForm;
use Src\Http\Middleware\UserVerify;
use Src\Models\User;

class LoginController extends AbstractController
{
    public ?array $errors = null;
    private array $data;
    private array $user;
    protected LoginForm $LoginForm;

    public function __construct()
    {
        parent::__construct();
        $this->LoginForm = new LoginForm;
    }

    public function get(): array
    {
        return $this->render('login');
    }

    public function post(): array
    {
        if (!$this->LoginForm->isCorrect())
            return (new ResponseController)->httpCodeResponse($this->LoginForm->errorCode);
        else $this->data = $this->LoginForm->getPostData();

        if ($this->u($this->data['u'])) $this->p($this->data['p']);

        if (isset($this->errors)) return $this->render('login', [
            'user' => $this->errors,
        ]);

        if (is_null($this->errors))
            if ((new UserVerify)->handle($this->user['uid']))
                header('Location: /');
                return $this->render('home');
    }

    private function u(string $username): bool
    {
        if (!$this->User->findUsername($username)) {
            $this->errors['username'] = [
                'username' => $username,
                'message' => "Incorrect username."
            ];
            return false;
        }

        $this->user['uid'] = (new User)->getUserId($username);
        $this->user['username'] = $username;
        return true;
    }

    private function p(string $password): void
    {
        if (!($this->User->getPassword($this->user['uid']) === $password)) {
            $this->errors = [
                'username' => [
                    'username' => $this->data['u']
                ],
                'password' => [
                    'password' => $password,
                    'message' => "Incorrect password."
                ]
            ];
        }
    }
}