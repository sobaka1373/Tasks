<?php

declare(strict_types=1);

require_once 'Form.php';

$users = [
    'user1@test.com' => [
        'name' => 'John',
        'password' => password_hash("test1234", PASSWORD_DEFAULT),

    ],
    'user2@test.com' => [
        'name' => 'Jane',
        'password' => password_hash("test12345", PASSWORD_DEFAULT),
    ],
];

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = stripslashes($_POST['email']);
    $email = htmlspecialchars($email);
    $email = strip_tags($email);

    $pass = stripslashes($_POST['password']);
    $pass = htmlspecialchars($pass);
    $pass = strip_tags($pass);

    $dbUsers = array_keys($users);

    $form = new Form($email, $pass);
    $user = $form->processingForm($dbUsers, $users);

    if ($user !== null) {
        echo "Welcome back, " . $user . "!";
    } else {
        echo "Login is incorrect.";
    }
} else {
    echo "Form empty";
}
