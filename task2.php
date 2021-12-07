<?php declare(strict_types = 1);
require_once '../vendor/autoload.php';
use PHPUnit\Framework\TestCase;

function mondaysCalculator() : array
{
    $mondaysArray = [];
    for ($month = 1, $year = 1900; $year < 2000; $month++) {
        $timestamp = mktime(0, 0, 0, $month, 1, $year);
        if (date("l", $timestamp) === "Monday") {
            $mondaysArray[] = date("d.m.Y", $timestamp);
        }

        if ($month === 12) {
            $year++;
            $month = 0;
        }
    }

    return $mondaysArray;
}

$mondaysArray = mondaysCalculator();
echo "Output: " . count($mondaysArray) . PHP_EOL;
echo implode(PHP_EOL, $mondaysArray) . PHP_EOL;

final class Task2Test extends TestCase
{
    public function testMondaysCalculator():void
    {
        $mondaysArray = mondaysCalculator();
        $this->assertSame($mondaysArray[2], "01-04-1901");
    }
}
