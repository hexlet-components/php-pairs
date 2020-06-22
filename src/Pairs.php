<?php

namespace Php\Pairs\Pairs;

/**
 * Creates a pair with two values
 * @param mixed $a first value
 * @param mixed $b second value
 * @return callable pair
 * @example
 * $pair = cons(5, 'hello');
 * @example
 * $pair = cons(cons(1, null), 'world');
 */
function cons($a, $b)
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
 * @param callable $pair
 * @return boolean
 * @example
 * $pair = cons(5, 'hello');
 * isPair($pair); // true
 * isPair(5); // false
 */
function isPair($pair)
{
    return is_callable($pair);
}

function checkPair($pair)
{
    if (!isPair($pair)) {
        $value = is_array($pair) ? 'array' : (string) $pair;
        throw new \Exception("Argument must be pair, but it was '{$value}'");
    }
}

/**
 * Get car (first element) from pair
 * @param callable $pair
 * @return mixed
 */
function car(callable $pair)
{
    checkPair($pair);
    return $pair("car");
}

/**
 * Get cdr (second element) from pair
 * @param callable $pair
 * @return mixed
 */
function cdr(callable $pair)
{
    checkPair($pair);
    return $pair("cdr");
}

/**
 * Convert pair to string (recursively)
 * @param callable $pair
 * @return string
 * @example
 * toString(cons('', 10)); // ('', 10)
 */
function toString($pair)
{
    checkPair($pair);
    $rec = function ($p) use (&$rec) {
        if (!isPair($p)) {
            if ($p === null) {
                return 'null';
            }
            if ($p === '') {
                return "''";
            }

            return (string) $p;
        }

        $recLeft = $rec(car($p));
        $recRight = $rec(cdr($p));

        return "({$recLeft}, {$recRight})";
    };

    return $rec($pair);
}
