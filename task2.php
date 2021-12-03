<?php declare(strict_types = 1);
require_once '../vendor/autoload.php';
use PHPUnit\Framework\TestCase;

function mondaysCalculator() : int {
    for($month = 1, $mondays = 0, $year = 1900; $year < 1999; $month++) {
        if (date("l", mktime(0, 0, 0, $month, 1, $year)) === "Monday") {
            $mondays++;
        }
        if ($month === 12) {
            $year++;
            $month = 0;
        }
    }
    echo "Output: " . $mondays . PHP_EOL;
    echo "01.01.1900" . PHP_EOL;
    echo "01.01.1999" . PHP_EOL;
    return $mondays;
}

mondaysCalculator();

final class Task2Test extends TestCase
{
    public function testMondaysCalculator():void
    {
        $mondays = mondaysCalculator();
        $this->assertSame($mondays, 170);
    }
}