<?php

declare(strict_types=1);

class Form
{
    private string $login;
    private string $password;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function processingForm($dbUsers, $users)
    {
        $currentUser = null;
        foreach ($dbUsers as $user) {
            if ($user === $this->login && password_verify($this->password, $users[$user]['password'])) {
                $currentUser =  $users[$user]['name'];
            }
        }

        return $currentUser;
    }
}