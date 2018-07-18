--TEST--
Equatable: compare to NULL does not call equals
--FILE--
<?php

class Eq implements Equatable
{
    public function equals($other): bool {}
}

var_dump(new Eq == null);
var_dump(null == new Eq);

?>
--EXPECTF--
bool(false)
bool(false)
