<?php declare(strict_types = 1);
require_once '../vendor/autoload.php';
use PHPUnit\Framework\TestCase;

function mondaysCalculator() : array
{
    $mondaysArray = [];
    for ($month = 1, $year = 1900; $year < 1999; $month++) {
        if (date("l", mktime(0, 0, 0, $month, 1, $year)) === "Monday") {
            $mondaysArray[] = date("d.m.Y", mktime(0, 0, 0, $month, 1, $year));
        }

        if ($month === 12) {
            $year++;
            $month = 0;
        }
    }

    return $mondaysArray;
}

$mondaysArray = mondaysCalculator();
$mondaysCount = count($mondaysArray);
echo "Output: " . $mondaysCount . PHP_EOL;
foreach ($mondaysArray as  $item) {
    echo $item . PHP_EOL;
}

final class Task2Test extends TestCase
{
    public function testMondaysCalculator():void
    {
        $mondaysArray = mondaysCalculator();
        $this->assertSame($mondaysArray[2], "01-04-1901");
    }
}