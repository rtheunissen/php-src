--TEST--
Comparable: extends Equatable
--FILE--
<?php

class Test implements Comparable {
    public function equals($other): bool {}
    public function compareTo($other): int {}
}

var_dump((new Test) instanceof Equatable);
?>
--EXPECT--
bool(true)
