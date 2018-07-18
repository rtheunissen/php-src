--TEST--
Equatable: throwing exception in equals is caught
--FILE--
<?php

class Eq implements Equatable
{
    public function equals($other): bool {
        echo __METHOD__ . PHP_EOL;
        throw new Exception('fail');
    }
}

try {
    new Eq() == new Eq();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
--EXPECT--
Eq::equals
fail
