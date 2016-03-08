<?php

namespace Pairs\tests;

use function Pairs\cons;
use function Pairs\car;
use function Pairs\cdr;
use function Pairs\toString;
use function Lists\length;
use function Lists\reverse;
use function Lists\map;
use function Lists\filter;
use function Lists\reduce;

class ListsTest extends \PHPUnit_Framework_TestCase
{

    public function testLength()
    {
        $list = cons(1, cons(2, cons(3, null)));
        $this->assertEquals(3, length($list));
    }

    public function testReverse()
    {
        $list = cons(1, cons(2, cons(3, null)));
        $expected = toString(cons(3, cons(2, cons(1, null))));
        $this->assertEquals($expected, toString(reverse($list)));
    }

    public function testMap()
    {
        $list = cons(1, cons(2, cons(3, null)));
        $expected = toString(cons(3, cons(4, cons(5, null))));
        $map = map(function ($x) {
            return $x + 2;
        }, $list);
        $this->assertEquals($expected, toString($map));
    }

    public function testFilter()
    {
        $list = cons(2, cons(3, cons(4, null)));
        $expected = toString(cons(2, cons(4, null)));
        $filter = filter(function ($x) {
            return $x % 2 == 0;
        }, $list);

        $this->assertEquals(2, length($filter));
        $this->assertEquals($expected, toString($filter));
    }

    public function testReduce()
    {
        $list = cons(1, cons(2, cons(3, null)));
        $expected = 6;
        $map = reduce(function ($x, $acc) {
            return $x + $acc;
        }, $list, 0);
        $this->assertEquals($expected, $map);
    }
}
