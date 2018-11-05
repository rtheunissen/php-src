--TEST--
Comparable: compare arrays
--FILE--
<?php
class Test implements Comparable
{
    public $value;
    public $decoy;

    public function __construct($value) {
        $this->value = $value;
        $this->decoy = rand();
    }

    public function equals($other): bool {
        printf("%s == %s\n", $this->value, $other->value);
        return $other->value == $this->value;
    }

    public function compareTo($other): ?int {
        printf("%s <=> %s\n", $this->value, $other->value);
        return $this->value <=> $other->value;
    }
}

$a = [new Test(0), new Test(1)];
$b = [new Test(2), new Test(0)];
$c = [new Test(2), new Test(0)];

var_dump($a === $a);    // true
var_dump($a === $b);    // false
var_dump($b === $c);    // false
echo "\n";

var_dump($a == $a);     // true
var_dump($a == $b);     // false
var_dump($b == $c);     // true
echo "\n";

var_dump($a <=> $b);    // -1
var_dump($a < $b);      // true
var_dump($a > $b);      // false
var_dump($a >= $b);     // false
var_dump($a <= $b);     // true
echo "\n";

sort($b);
printf("%s %s", $b[0]->value, $b[1]->value);

?>
--EXPECT--
bool(true)
bool(false)
bool(false)

bool(true)
0 == 2
bool(false)
2 == 2
0 == 0
bool(true)

0 <=> 2
int(-1)
0 <=> 2
bool(true)
2 <=> 0
bool(false)
2 <=> 0
bool(false)
0 <=> 2
bool(true)

2 <=> 0
0 2
