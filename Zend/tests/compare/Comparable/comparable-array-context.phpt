--TEST--
Comparable: array functions use correct context
--FILE--
<?php

class Test implements Comparable
{
    public function equals($other): bool {}
    public function compareTo($other): int {
        echo ".";
        return 0;
    }
}

$a = [new Test, new Test];
$b = [new Test, new Test];

$a > $b;
echo ":";

$a < $b;
echo ":";

$a >= $b;
echo ":";

$a <= $b;
echo ":";

$a <=> $b;
echo ":";

sort($a);
?>
--EXPECT--
..:..:..:..:..:.
