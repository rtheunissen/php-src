--TEST--
Comparable: methods are inherited
--FILE--
<?php

class A implements Comparable
{
    public function equals($other): bool {}
    public function compareTo($other): int {
        echo __METHOD__ . PHP_EOL;
        return -1;
    }
}

class B extends A {}

var_dump((new B) instanceof Comparable);
var_dump((new B) instanceof Equatable);
var_dump((new B) <=> 5);

?>
--EXPECT--
bool(true)
bool(true)
A::compareTo
int(-1)
