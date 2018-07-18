--TEST--
Comparable: operator overloading
--FILE--
<?php

class Cmp implements Comparable
{
    public function equals($other): bool {
        echo 'x';
        return false;
    }
    public function compareTo($other): int {
        echo '.';
        return 0;
    }
}

new Cmp < 0;
new Cmp > 0;
new Cmp <= 0;
new Cmp >= 0;
new Cmp <=> 0;

0 < new Cmp;
0 > new Cmp;
0 <= new Cmp;
0 >= new Cmp;
0 <=> new Cmp;

/* compareTo should not be called for these */
new Cmp == 0;
new Cmp === 0;

?>
--EXPECT--
..........x
