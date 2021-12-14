<?php
/*
 * The main file connecting the form.
 */
declare(strict_types=1);

require_once 'Form.php';

// Get POST method form
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = processingFields($_POST['email']);
    $pass =  $_POST['password'];



    $form = new Form($email, $pass);
    $user = $form->authenticate();

    if ($user !== null) {
        echo "Welcome back, " . $user . "!";
    } else {
        echo "Login is incorrect.";
    }
} else {
    echo "Form empty";
}

// Data processing in the form
function processingFields(string $field) :string
{
    $field = stripslashes($field);
    $field = htmlspecialchars($field);
    $field = strip_tags($field);
    return $field;
}

// User data
function setUp() :array
{
    return $users = [
        'user1@test.com' => [
            'name' => 'John',
            'password' => password_hash("test1234", PASSWORD_DEFAULT),

        ],
        'user2@test.com' => [
            'name' => 'Jane',
            'password' => password_hash("test12345", PASSWORD_DEFAULT),
        ],
    ];
}