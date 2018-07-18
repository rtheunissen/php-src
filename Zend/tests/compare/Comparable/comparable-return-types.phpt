--TEST--
Comparable: must enforce return typehints
--FILE--
<?php
class Cmp implements Comparable {
    public function equals($other) {}
    public function compareTo($other) {}
}

?>
--EXPECTF--
Fatal error: Declaration of Cmp::compareTo($other) must be compatible with Comparable::compareTo($other): ?int in %s on line %d
