<?php declare(strict_types = 1);
require './vendor/autoload.php';
use PHPUnit\Framework\TestCase;

//Column fold
function calculateFibColumn(int $num) : string {
    $first = '0';
    $second = '1';
    $sum = 0;

    for ($i = 0; $i < $num; $i++) {
        $sum = sum($first, $second);
        $first = $second;
        $second = $sum;
    }

    return (string)$sum;
}

function sum(string $first, string $second): string
{
    $second = strrev($second);
    $first = strrev($first);
    $result = '';
    $decimal = 0;

    for ($i = 0; $i < strlen($second); $i++) {
        if (isset($first[$i])) {
            if ($decimal != 0) {
                $sum = $second[$i] + $first[$i] + 1;
                $decimal = 0;
            } else {
                $sum = $second[$i] + $first[$i];
            }
            calculateDecimals($sum, $decimal);
            $result .= $sum;
        }
        else {
            if ($decimal != 0) {
                $sum = $second[$i] + 1;
                $decimal = 0;
            } else {
                $sum = $second[$i];
            }
            calculateDecimals($sum, $decimal);
            $result .= $sum;
        }
    }
    if ($decimal != 0) {
        $result .= $decimal;
    }
    $result = strrev($result);
    return $result;
}

function calculateDecimals(&$sum, &$decimal) {
    if (intdiv((int)$sum, 10)) {
        $decimal = 1;
        $sum = $sum % 10;
    }
}

$answer = 0;
$answer = calculateFibColumn(1000);
$digits = strlen($answer);
echo "Digits: " . $digits . " ";
echo "Answer: " . $answer . " ";

final class FibTest extends TestCase
{
    public function testCalculateFib():void
    {
        $answer = calculateFibColumn(1000);
        $this->assertSame($answer, '70330367711422815821835254877183549770181269836358732742604905087154537118196933579742249494562611733487750449241765991088186363265450223647106012053374121273867339111198139373125598767690091902245245323403501');
    }
}