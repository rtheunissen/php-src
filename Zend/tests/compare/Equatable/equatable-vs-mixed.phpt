--TEST--
Equatable: compare to scalar values
--FILE--
<?php

class Eq implements Equatable
{
    public function equals($other): bool {
        var_dump(__METHOD__, $other);
        return true;
    }
}

/* These should not call equals */
var_dump(new Eq === 1);
var_dump(new Eq === PHP_INT_MAX);
var_dump(new Eq === -PHP_INT_MAX);
var_dump(new Eq === 0.1);
var_dump(new Eq === 'abc');
var_dump(new Eq === true);
var_dump(new Eq === false);
var_dump(new Eq === [1,2,3]);

var_dump(new Eq == 1);
var_dump(new Eq == PHP_INT_MAX);
var_dump(new Eq == -PHP_INT_MAX);
var_dump(new Eq == 0.1);
var_dump(new Eq == 'abc');
var_dump(new Eq == true);
var_dump(new Eq == false);
var_dump(new Eq == [1,2,3]);

var_dump(1 == new Eq);
var_dump(PHP_INT_MAX == new Eq);
var_dump(-PHP_INT_MAX == new Eq);
var_dump(0.1 == new Eq);
var_dump('abc' == new Eq);
var_dump(true == new Eq);
var_dump(false == new Eq);
var_dump([1,2,3] == new Eq);

?>
--EXPECT--
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
string(10) "Eq::equals"
int(1)
bool(true)
string(10) "Eq::equals"
int(9223372036854775807)
bool(true)
string(10) "Eq::equals"
int(-9223372036854775807)
bool(true)
string(10) "Eq::equals"
float(0.1)
bool(true)
string(10) "Eq::equals"
string(3) "abc"
bool(true)
bool(true)
bool(false)
string(10) "Eq::equals"
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  int(3)
}
bool(true)
string(10) "Eq::equals"
int(1)
bool(true)
string(10) "Eq::equals"
int(9223372036854775807)
bool(true)
string(10) "Eq::equals"
int(-9223372036854775807)
bool(true)
string(10) "Eq::equals"
float(0.1)
bool(true)
string(10) "Eq::equals"
string(3) "abc"
bool(true)
bool(true)
bool(false)
string(10) "Eq::equals"
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  int(3)
}
bool(true)
