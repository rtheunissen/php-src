--TEST--
Comparable: order of precedence
--FILE--
<?php

/**
 * Not comparable
 */
class Obj
{
    public function equals($other): bool {}
    public function compareTo($other): int {}
}

/**
 * Equatable only
 */
class Eq implements Equatable
{
    public $id;
    public function __construct($id) {
        $this->id = $id;
    }

    public function equals($other): bool {
        echo "{$this->id}: " . __METHOD__ . PHP_EOL;
        return false;
    }
}

/**
 * Comparable
 */
class Cmp implements Comparable
{
    public $id;
    public function __construct($id) {
        $this->id = $id;
    }

    public function equals($other): bool {
        echo "{$this->id}: " . __METHOD__ . PHP_EOL;
        return false;
    }

    public function compareTo($other): int {
        echo "{$this->id}: " . __METHOD__ . PHP_EOL;
        return 0;
    }
}

$obj1 = new Obj(1);
$obj2 = new Obj(2);

$eq1 = new Eq(1);
$eq2 = new Eq(2);

$cmp1 = new Cmp(1);
$cmp2 = new Cmp(2);

echo '---' . PHP_EOL;
$obj1 <=> $obj1;
$obj1 <=> $obj2;
$obj1 <=> $eq1;
$obj1 <=> $cmp1;    // Use cmp1 compareTo

echo '---' . PHP_EOL;
$eq1 <=> $obj1;
$eq1 <=> $eq1;
$eq1 <=> $eq2;
$eq1 <=> $cmp1;     // Use cmp1 compareTo

echo '---' . PHP_EOL;
$cmp1 <=> $obj1;    // Use cmp1 compareTo
$cmp1 <=> $cmp1;
$cmp1 <=> $cmp2;    // Use cmp1 compareTo
$cmp1 <=> $eq1;     // Use cmp1 compareTo

echo '---' . PHP_EOL;
$cmp1 <=> new DateTime();   // Use cmp1 compareTo
new DateTime() <=> $cmp1;   // Use cmp1 compareTo

?>
--EXPECT--
---
1: Cmp::compareTo
---
1: Cmp::compareTo
---
1: Cmp::compareTo
1: Cmp::compareTo
1: Cmp::compareTo
---
1: Cmp::compareTo
1: Cmp::compareTo
