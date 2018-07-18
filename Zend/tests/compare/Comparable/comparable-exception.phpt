--TEST--
Comparable: throwing exception in compareTo is caught
--FILE--
<?php

class Cmp implements Comparable
{
    public function equals($other): bool {}
    public function compareTo($other): int {
        echo __METHOD__ . PHP_EOL;
        throw new Exception('fail');
    }
}

try {
    new Cmp() <=> new Cmp();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
--EXPECT--
Cmp::compareTo
fail
