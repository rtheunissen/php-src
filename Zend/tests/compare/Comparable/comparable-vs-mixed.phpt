--TEST--
Comparable: compare to scalar values
--FILE--
<?php

class Cmp implements Comparable
{
    public function equals($other): bool {
        var_dump(__METHOD__, $other);
        return true;
    }
    public function compareTo($other): ?int {
        var_dump(__METHOD__, $other);
        return -1;
    }
}

var_dump(new Cmp <=> 1);
var_dump(new Cmp <=> PHP_INT_MAX);
var_dump(new Cmp <=> -PHP_INT_MAX);
var_dump(new Cmp <=> 0.1);
var_dump(new Cmp <=> 'abc');
var_dump(new Cmp <=> true);
var_dump(new Cmp <=> false);
var_dump(new Cmp <=> [1,2,3]);

var_dump(1 <=> new Cmp);
var_dump(PHP_INT_MAX <=> new Cmp);
var_dump(-PHP_INT_MAX <=> new Cmp);
var_dump(0.1 <=> new Cmp);
var_dump('abc' <=> new Cmp);
var_dump(true <=> new Cmp);
var_dump(false <=> new Cmp);
var_dump([1,2,3] <=> new Cmp);

?>
--EXPECT--
string(14) "Cmp::compareTo"
int(1)
int(-1)
string(14) "Cmp::compareTo"
int(9223372036854775807)
int(-1)
string(14) "Cmp::compareTo"
int(-9223372036854775807)
int(-1)
string(14) "Cmp::compareTo"
float(0.1)
int(-1)
string(14) "Cmp::compareTo"
string(3) "abc"
int(-1)
string(14) "Cmp::compareTo"
bool(true)
int(-1)
string(14) "Cmp::compareTo"
bool(false)
int(-1)
string(14) "Cmp::compareTo"
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  int(3)
}
int(-1)
string(14) "Cmp::compareTo"
int(1)
int(1)
string(14) "Cmp::compareTo"
int(9223372036854775807)
int(1)
string(14) "Cmp::compareTo"
int(-9223372036854775807)
int(1)
string(14) "Cmp::compareTo"
float(0.1)
int(1)
string(14) "Cmp::compareTo"
string(3) "abc"
int(1)
string(14) "Cmp::compareTo"
bool(true)
int(1)
string(14) "Cmp::compareTo"
bool(false)
int(1)
string(14) "Cmp::compareTo"
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  int(3)
}
int(1)
