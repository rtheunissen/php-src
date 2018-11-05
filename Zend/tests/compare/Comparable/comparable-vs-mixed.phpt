--TEST--
Comparable: compare to mixed types
--FILE--
<?php

class Cmp implements Comparable
{
    public function equals($other): bool {
        printf("%s\n", __METHOD__);
        return true;
    }
    public function compareTo($other): ?int {
        printf("%s\n", __METHOD__);
        return -1;
    }
}

var_dump(new Cmp <=> 1);
var_dump(new Cmp <=> 0.1);
var_dump(new Cmp <=> 'abc');
var_dump(new Cmp <=> true);
var_dump(new Cmp <=> false);
var_dump(new Cmp <=> [1,2,3]);

echo "===\n";

var_dump(1 <=> new Cmp);
var_dump(0.1 <=> new Cmp);
var_dump('abc' <=> new Cmp);
var_dump(true <=> new Cmp);
var_dump(false <=> new Cmp);
var_dump([1,2,3] <=> new Cmp);

?>
--EXPECT--
Cmp::compareTo
int(-1)
Cmp::compareTo
int(-1)
Cmp::compareTo
int(-1)
Cmp::compareTo
int(-1)
Cmp::compareTo
int(-1)
Cmp::compareTo
int(-1)
===
Cmp::compareTo
int(1)
Cmp::compareTo
int(1)
Cmp::compareTo
int(1)
Cmp::compareTo
int(1)
Cmp::compareTo
int(1)
Cmp::compareTo
int(1)
