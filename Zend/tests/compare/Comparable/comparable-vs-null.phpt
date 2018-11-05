--TEST--
Comparable: compare to NULL does not call compareTo
--FILE--
<?php

class Cmp implements Comparable
{
    public function equals($other): bool {}
    public function compareTo($other): ?int {
        var_dump($other);
    }
}

var_dump(new Cmp <=> null);
var_dump(null <=> new Cmp);

?>
--EXPECTF--
int(1)
int(-1)
