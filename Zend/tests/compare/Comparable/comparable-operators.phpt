--TEST--
Comparable: operator overloading
--FILE--
<?php
class Test implements Comparable
{
    public function equals($other): bool {
        printf("%s\n", __METHOD__);
        return false;
    }
    public function compareTo($other): int {
        printf("%s\n", __METHOD__);
        return 0;
    }
}

new Test < 0;
new Test > 0;
new Test <= 0;
new Test >= 0;
new Test <=> 0;

0 < new Test;
0 > new Test;
0 <= new Test;
0 >= new Test;
0 <=> new Test;

/* compareTo should not be called for these */
new Test == 0;
0 == new Test;

new Test === 0;
0 === new Test;
?>
--EXPECT--
Test::compareTo
Test::compareTo
Test::compareTo
Test::compareTo
Test::compareTo
Test::compareTo
Test::compareTo
Test::compareTo
Test::compareTo
Test::compareTo
Test::equals
Test::equals
