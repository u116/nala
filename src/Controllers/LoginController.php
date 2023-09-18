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

    public function get(): array
    {
        return $this->render('login');
    }

    public function post(): array
    {
        $form = (new LoginForm)->isCorrect();

        if (is_int($form))return (new ResponseController)->httpCodeResponse($form);

        if ($this->u(($this->data = $form->getTrimmedValues())['u'])) $this->p($this->data['p']);

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
                'username' => $this->data['u'],
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
            $this->errors['password'] = [
                'password' => $this->data['p'],
                'message' => "Incorrect password."
            ];
        }
    }
}