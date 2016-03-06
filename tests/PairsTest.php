<?php

namespace Pairs\tests;

require_once 'Pairs.php';

use function Pairs\cons;
use function Pairs\car;
use function Pairs\cdr;

class PairsTest extends \PHPUnit_Framework_TestCase
{
    public function testPairs()
    {
        $pair = cons(1, 2);
        $this->assertEquals(1, car($pair));
        $this->assertEquals(2, cdr($pair));
    }
}
