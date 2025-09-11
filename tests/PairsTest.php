<?php

namespace Php\Pairs\Tests;

use PHPUnit\Framework\TestCase;

use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\cdr;
use function Php\Pairs\Pairs\toString;
use function Php\Pairs\Pairs\checkPair;

class PairsTest extends TestCase
{
    public function testPairs(): void
    {
        $pair = cons(3, 4);

        $this->assertEquals(3, car($pair));
        $this->assertEquals(4, cdr($pair));
    }

    public function testToString(): void
    {
        $pair1 = cons(3, cons(3, 2));
        $pair2 = cons(cons(3, 5), cons(1, null));
        $pair3 = cons(10, -10);
        $pair4 = cons('', -10);

        $this->assertEquals('(3, (3, 2))', toString($pair1));
        $this->assertEquals('((3, 5), (1, null))', toString($pair2));
        $this->assertEquals('(10, -10)', toString($pair3));
        $this->assertEquals("('', -10)", toString($pair4));
    }

    public function testCheckPair(): void
    {
        $this->expectExceptionMessage("Argument must be pair, but it was 'integer'");
        checkPair(1);
        $this->expectExceptionMessage("Argument must be pair, but it was 'string'");
        checkPair('some string');
        $this->expectExceptionMessage("Argument must be pair, but it was 'array'");
        checkPair([1, 2]);
        $this->expectExceptionMessage("Argument must be pair, but it was 'null'");
        checkPair(null);
    }
}
