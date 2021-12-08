<?php declare(strict_types = 1);
require_once '../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
require_once 'Form.php';

class Task3Test extends TestCase
{
    public function testMondaysCalculator():void
    {
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
        $dbUsers = array_keys($users);
        $form = new Form('user1@test.com', 'test1234');
        $user = $form->processingForm($dbUsers, $users);
        $this->assertSame($user, "John");
    }
}