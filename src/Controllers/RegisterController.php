<?php

namespace Src\Controllers;

use Src\Http\Forms\RegisterForm;
use Src\Http\Middleware\UserVerify;
use Src\Models\User;

class RegisterController extends AbstractController
{
    public ?array $errors = null;
    private array $data;
    private const U_MIN_CHAR = 3;
    private const U_MAX_CHAR = 16;

    protected RegisterForm $RegisterForm;

    public function __construct()
    {
        parent::__construct();
        $this->RegisterForm = new RegisterForm;
    }

    public function get(): array
    {
        return $this->render('register');
    }

    public function post()
    {
        if (!$this->RegisterForm->isCorrect())
            return (new ResponseController)->httpCodeResponse($this->RegisterForm->errorCode);
        else $this->data = $this->RegisterForm->getPostData();

        $this->u($this->data['u']);
        $this->e($this->data['e']);
        $this->p($this->data['p']);

        if (isset($this->errors)) return $this->render('register', [
            'user' => $this->errors,
        ]);

        if (is_null($this->errors))
            if ((new UserVerify)->handle($this->User->register(
                    $this->data['u'],
                    $this->data['p'],
                    $this->data['e']
                )))
                header('Location: /');
        return $this->render('home');
    }

    private function u(string $username): void
    {
        if (empty($username) || !preg_match('/^[a-zA-Z0-9]+$/', $username))
            $this->errors['username']['message'] = "Username must only consist of alphanumeric characters.";

        if (!strlenBetween($username, self::U_MIN_CHAR, self::U_MAX_CHAR))
            $this->errors['username']['message'] = "Username length must be between 3 and 16 chars.";

        if ($this->User->findUsername($username))
            $this->errors['username']['message'] = "Username already exists.";


        if (isset($this->errors['username']))
            $this->errors['username']['username'] = $username;
    }

    private function p(string $password): void
    {
        if (empty($password)) $this->errors['password']['message'] = "You need a password.";
    }

    private function e(string $email = null): void
    {
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = [
                'email' => $this->data['e'],
                'message' => 'Email is not valid.'
            ];
        }

        $this->data['e'] = null;
    }
}