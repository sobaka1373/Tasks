<?php declare(strict_types = 1);
require_once '../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
require_once 'Form.php';

class Task3Test extends TestCase
{
    public function testForm():void
    {
        $form = new Form('user1@test.com', 'test1234');
        $user = $form->authenticate();
        $this->assertSame($user, "John");
    }
}