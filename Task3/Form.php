<?php

declare(strict_types=1);

class Form
{
    private string $login;
    private string $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    // User Authentication
    public function authenticate() :string
    {
        $users = setUp();
        $keyUsers = array_keys($users);
        $currentUser = null;
        foreach ($keyUsers as $user) {
            if ($user === $this->login && password_verify($this->password, $users[$user]['password'])) {
                $currentUser =  $users[$user]['name'];
                break;
            }
        }

        return $currentUser;
    }
}