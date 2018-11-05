--TEST--
Comparable: throwing exception in compareTo or equals is caught
--FILE--
<?php
class Test implements Comparable
{
    public function equals($other): bool {
        throw new Exception(__METHOD__);
    }

    public function compareTo($other): int {
        throw new Exception(__METHOD__);
    }
}

try {
    new Test() <=> new Test();
} catch (Exception $e) {
    printf("%s\n", $e->getMessage());
}

try {
    new Test() == new Test();
} catch (Exception $e) {
    printf("%s\n", $e->getMessage());
}

/* Make sure that identity is not affected. */
new Test() === new Test();
?>
--EXPECT--
Test::compareTo
Test::equals
