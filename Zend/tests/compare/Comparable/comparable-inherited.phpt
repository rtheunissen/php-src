--TEST--
Comparable: methods are inherited
--FILE--
<?php
class Test implements Comparable
{
    public function equals($other): bool {}
    public function compareTo($other): int {
        printf("%s\n", __METHOD__);
        return -1;
    }
}

class Other extends Test 
{

}

var_dump((new Other) instanceof Comparable);
var_dump((new Other) <=> 5);
?>
--EXPECT--
bool(true)
Test::compareTo
int(-1)
