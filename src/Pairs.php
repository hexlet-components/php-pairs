<?php

namespace Pairs;

/**
 * Creates a pair with two values
 * @param mixed $x first value
 * @param mixed $y second value
 * @return callable pair
 */
function cons($x, $y)
{
    return function ($method) use ($x, $y) {
        switch ($method) {
            case "car":
                return $x;
            case "cdr":
                return $y;
            default:
                throw new \InvalidArgumentException("Invalid method $method.");
        }
    };
}

/**
 * Extracts first value from pair
 * @param callalble $pair
 * @return mixed
 */
function car(callable $pair)
{
    return $pair("car");
}

/**
 * Extracts second value from pair
 * @param callalble $pair
 * @return mixed
 */
function cdr(callable $pair)
{
    return $pair("cdr");
}

/**
 * Converts given list to string
 * @param callalble $list
 * @return string
 */
function toString($list)
{
    if (!isPair($list)) {
        return $list;
    }

    $iter = function ($items, array $acc = []) use (&$iter) {
        if ($items == null) {
            return $acc;
        }
        return $iter(cdr($items), array_merge($acc, [toString(car($items))]));
    };
    $arr = $iter($list);

    return "(" . implode(", ", $arr) . ")";
}

/**
 * Checks whether given $pair is valid pair
 * @param callable $pair
 * @return boolean
 */
function isPair($pair)
{
    return is_callable($pair);
}
