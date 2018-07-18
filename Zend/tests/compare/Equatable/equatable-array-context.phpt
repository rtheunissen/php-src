--TEST--
Equatable: array functions use correct context
--FILE--
<?php

class Test implements Equatable
{
    public function equals($other): bool {
        echo ".";
        return true;
    }
}

$a = [new Test, new Test];
$b = [new Test, new Test];

$a == $b;
echo ":";

array_search('a', $b);
echo ":";

array_search('a', $b, true);
echo ":";

in_array('a', $b);
echo ":";

in_array('a', $b, true);

?>
--EXPECT--
..:.::.:
