<?php

namespace PhpPairs\Pairs\tests;

use function PhpPairs\Pairs\cons;
use function PhpPairs\Pairs\car;
use function PhpPairs\Pairs\cdr;

use PHPUnit\Framework\TestCase;

class PairsTest extends TestCase
{
    public function testPairs()
    {
        $pair = cons(1, 2);
        $this->assertEquals(1, car($pair));
        $this->assertEquals(2, cdr($pair));
    }
}
