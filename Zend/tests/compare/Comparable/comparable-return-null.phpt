--TEST--
Comparable: return NULL to indicate undefined natural ordering
--FILE--
<?php

class Cmp implements Comparable
{
    public function equals($other): bool {}
    public function compareTo($other): ?int {
        return null;
    }
}

var_dump(new Cmp <=> 5);
var_dump(new Cmp <=> new stdClass);

?>
--EXPECTF--
Notice: Object of class Cmp could not be compared to int in %s on line %d
int(1)

Notice: Object of class Cmp could not be compared to object of class stdClass in %s on line %d
int(1)
