<?php

namespace Php\Pairs\Pairs;

use Closure;

/**
 * Creates a pair with two values
 * @param mixed $a first value
 * @param mixed $b second value
 * @return Closure pair
 * @example
 * $pair = cons(5, 'hello');
 * @example
 * $pair = cons(cons(1, null), 'world');
 */
function cons($a, $b): Closure
{
    return function ($method) use ($a, $b) {
        switch ($method) {
            case "car":
                return $a;
            case "cdr":
                return $b;
            default:
                throw new \InvalidArgumentException("Invalid method $method.");
        }
    };
}

/**
 * Check if something is pair
 * @param Closure $pair
 * @return boolean
 * @example
 * $pair = cons(5, 'hello');
 * isPair($pair); // true
 * isPair(5); // false
 */
function isPair(mixed $pair): bool
{
    return $pair instanceof Closure;
}

/**
 * @param mixed $pair
 * @return void
 * @throws \Exception
 */
function checkPair(mixed $pair): void
{
    if (!isPair($pair)) {
        $value = gettype($pair);
        throw new \Exception("Argument must be pair, but it was '{$value}'");
    }
}

/**
 * Get car (first element) from pair
 * @param Closure $pair
 * @return mixed
 */
function car(Closure $pair): mixed
{
    checkPair($pair);
    return $pair("car");
}

/**
 * Get cdr (second element) from pair
 * @param Closure $pair
 * @return mixed
 */
function cdr(Closure $pair): mixed
{
    checkPair($pair);
    return $pair("cdr");
}

/**
 * Convert pair to string (recursively)
 * @param Closure $pair
 * @return string
 * @example
 * toString(cons('', 10)); // ('', 10)
 */
function toString(mixed $pair): string
{
    checkPair($pair);
    $iter = function ($p) use (&$iter) {
        if (!isPair($p)) {
            if ($p === null) {
                return 'null';
            }
            if ($p === '') {
                return "''";
            }

            return (string) $p;
        }

        $recLeft = $iter(car($p));
        $recRight = $iter(cdr($p));

        return "({$recLeft}, {$recRight})";
    };

    return $iter($pair);
}
