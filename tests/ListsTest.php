<?php

namespace Pairs\tests;

use function Pairs\cons;
use function Pairs\car;
use function Pairs\cdr;
use function Pairs\toString;
use function Lists\length;
use function Lists\reverse;
use function Lists\l;
use function Lists\map;
use function Lists\filter;
use function Lists\reduce;

class ListsTest extends \PHPUnit_Framework_TestCase
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
