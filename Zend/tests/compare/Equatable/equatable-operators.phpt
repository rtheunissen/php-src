--TEST--
Equatable: operator overloading
--FILE--
<?php

class Eq implements Equatable
{
    public function equals($other): bool {
        echo '.';
        return false;
    }
}

0 == new Eq;
new Eq == 0;
echo ":";

0 === new Eq;
new Eq === 0;
echo ":";

?>
--EXPECT--
..::
