--TEST--
Comparable: order of precedence and symmetry
--FILE--
<?php
/**
 * Not comparable.
 */
class Obj
{
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
        printf("%s %s\n", __METHOD__, $this->id);
        return false;
    }

    public function compareTo($other): int {
        printf("%s %s\n", __METHOD__, $this->id);
        return 0;
    }
}

$obj1 = new Obj(1);
$obj2 = new Obj(2);
$cmp1 = new Cmp(1);
$cmp2 = new Cmp(2);

$obj1 <=> $obj2;
$obj1 <=> $cmp1;    // Use cmp1 compareTo
$obj1 <=> $cmp2;    // Use cmp2 compareTo

$cmp1 <=> $obj1;    // Use cmp1 compareTo
$cmp1 <=> $cmp1;    // Use cmp1 compareTo
$cmp1 <=> $cmp2;    // Use cmp1 compareTo

$cmp2 <=> $obj1;    // Use cmp2 compareTo
$cmp2 <=> $cmp1;    // Use cmp2 compareTo
$cmp2 <=> $cmp2;    // Use cmp2 compareTo

$cmp1 <=> new DateTime();   // Use cmp1 compareTo
new DateTime() <=> $cmp1;   // Use cmp1 compareTo

echo "===\n";

$obj1 == $obj2;
$obj1 == $cmp1;    // Use cmp1 equals
$obj1 == $cmp2;    // Use cmp2 equals

$cmp1 == $obj1;    // Use cmp1 equals
$cmp1 == $cmp1;    // Use cmp1 equals
$cmp1 == $cmp2;    // Use cmp1 equals

$cmp2 == $obj1;    // Use cmp2 equals
$cmp2 == $cmp1;    // Use cmp2 equals
$cmp2 == $cmp2;    // Use cmp2 equals

$cmp1 == new DateTime();   // Use cmp1 equals
new DateTime() == $cmp1;   // Use cmp1 equals

?>
--EXPECT--
Cmp::compareTo 1
Cmp::compareTo 2
Cmp::compareTo 1
Cmp::compareTo 1
Cmp::compareTo 1
Cmp::compareTo 2
Cmp::compareTo 2
Cmp::compareTo 2
Cmp::compareTo 1
Cmp::compareTo 1
===
Cmp::equals 1
Cmp::equals 2
Cmp::equals 1
Cmp::equals 1
Cmp::equals 1
Cmp::equals 2
Cmp::equals 2
Cmp::equals 2
Cmp::equals 1
Cmp::equals 1
