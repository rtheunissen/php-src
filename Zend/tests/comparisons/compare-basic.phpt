--TEST--
__compareTo: Basic comparison behaviour
--FILE--
<?php
include("setup.inc");

var_dump(new Comparable(1) < new Comparable(0)); // false
var_dump(new Comparable(1) < new Comparable(1)); // false
var_dump(new Comparable(1) < new Comparable(2)); // true

var_dump(new Comparable(1) > new Comparable(0)); // true
var_dump(new Comparable(1) > new Comparable(1)); // false
var_dump(new Comparable(1) > new Comparable(2)); // false

var_dump(new Comparable(1) <= new Comparable(0)); // false
var_dump(new Comparable(1) <= new Comparable(1)); // true
var_dump(new Comparable(1) <= new Comparable(2)); // true

var_dump(new Comparable(1) >= new Comparable(0)); // true
var_dump(new Comparable(1) >= new Comparable(1)); // true
var_dump(new Comparable(1) >= new Comparable(2)); // false

var_dump(new Comparable(1) == new Comparable(0)); // false
var_dump(new Comparable(1) == new Comparable(1)); // true
var_dump(new Comparable(1) == new Comparable(2)); // false

var_dump(new Comparable(1) != new Comparable(0)); // true
var_dump(new Comparable(1) != new Comparable(1)); // false
var_dump(new Comparable(1) != new Comparable(2)); // true

var_dump(new Comparable(1) === new Comparable(0)); // false
var_dump(new Comparable(1) === new Comparable(1)); // false
var_dump(new Comparable(1) === new Comparable(2)); // false

var_dump(new Comparable(1) !== new Comparable(0)); // true
var_dump(new Comparable(1) !== new Comparable(1)); // true
var_dump(new Comparable(1) !== new Comparable(2)); // true

var_dump(new Comparable(1) <=> new Comparable(0)); //  1
var_dump(new Comparable(1) <=> new Comparable(1)); //  0
var_dump(new Comparable(1) <=> new Comparable(2)); // -1

?>
--EXPECTF--
bool(false)
bool(false)
bool(true)
bool(true)
bool(false)
bool(false)
bool(false)
bool(true)
bool(true)
bool(true)
bool(true)
bool(false)
bool(false)
bool(true)
bool(false)
bool(true)
bool(false)
bool(true)
bool(false)
bool(false)
bool(false)
bool(true)
bool(true)
bool(true)
int(1)
int(0)
int(-1)
