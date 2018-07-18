--TEST--
Equatable: methods are inherited
--FILE--
<?php

class A implements Equatable
{
    public function equals($other): bool {
        echo __METHOD__ . PHP_EOL;
        return true;
    }
}

class B extends A {}

var_dump((new B) instanceof Equatable);
var_dump((new B) == 5);

?>
--EXPECT--
bool(true)
A::equals
bool(true)
