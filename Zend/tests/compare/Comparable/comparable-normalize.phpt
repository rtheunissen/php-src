--TEST--
Comparable: normalizes to sign when using spaceship
--FILE--
<?php

class Test implements Comparable
{
    public function equals($other): bool {}
    public function compareTo($other): int {
        return $other;
    }
}

var_dump(new Test <=> 10);
var_dump(new Test <=> -10);
?>
--EXPECT--
int(1)
int(-1)
