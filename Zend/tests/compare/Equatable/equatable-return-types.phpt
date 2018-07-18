--TEST--
Equatable: must enforce return typehints
--FILE--
<?php
class Eq implements Equatable {
    public function equals($other) {}
}

?>
--EXPECTF--
Fatal error: Declaration of Eq::equals($other) must be compatible with Equatable::equals($other): bool in %s on line %d
