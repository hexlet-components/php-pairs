<?php

namespace PhpPairs\tests;

use function PhpPairs\Pairs\cons;
use function PhpPairs\Pairs\car;
use function PhpPairs\Pairs\cdr;
use function PhpPairs\Pairs\toString;
use function PhpPairs\Lists\length;
use function PhpPairs\Lists\reverse;
use function PhpPairs\Lists\l;
use function PhpPairs\Lists\map;
use function PhpPairs\Lists\filter;
use function PhpPairs\Lists\reduce;

use PHPUnit\Framework\TestCase;

class ListsTest extends TestCase
{

    public function testL()
    {
        $this->assertEquals(toString(l()), toString(l()));
        $list = cons(1, cons((cons(3, cons(4, null))), cons(5, null)));
        $this->assertEquals(toString($list), toString(l(1, l(3, 4), 5)));
    }

    public function testLength()
    {
        $this->assertEquals(0, length(l()));
        $list = l(1, 2, 3);
        $this->assertEquals(3, length($list));
    }

    public function testReverse()
    {
        $this->assertEquals(toString(l()), toString(reverse(l())));

        $list = l(1, 2, 3);
        $expected = toString(l(3, 2, 1));
        $this->assertEquals($expected, toString(reverse($list)));
    }

    public function testMap()
    {
        $list = l(1, 2, 3);
        $expected = toString(l(3, 4, 5));
        $map = map(function ($x) {
            return $x + 2;
        }, $list);
        $this->assertEquals($expected, toString($map));

        $list2 = l();
        $map = map(function ($x) {
            return $x + 2;
        }, $list2);
        $this->assertEquals(toString(l()), toString($map));
    }

    public function testFilter()
    {
        $list = l(2, 3, 4);
        $expected = toString(l(2, 4));
        $filter = filter(function ($x) {
            return $x % 2 == 0;
        }, $list);

        $this->assertEquals(2, length($filter));
        $this->assertEquals($expected, toString($filter));

        $list2 = l();
        $expected = toString(l());
        $filtered = filter(function ($x) {
            return $x % 2 == 0;
        }, $list2);
        $this->assertEquals($expected, toString($filtered));
    }

    public function testReduce()
    {
        $list = l(1, 2, 3);
        $expected = 6;
        $reduced = reduce(function ($x, $acc) {
            return $x + $acc;
        }, $list, 0);
        $this->assertEquals($expected, $reduced);

        $list2 = l();
        $expected = null;
        $reduced2 = reduce(function ($x, $acc) {
            return $x + $acc;
        }, $list2);
        $this->assertEquals($expected, $reduced2);
    }
}
