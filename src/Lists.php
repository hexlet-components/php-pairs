<?php

namespace Lists;

use function Pairs\cons;
use function Pairs\car;
use function Pairs\cdr;
use function Pairs\toString;

/**
 * Applies callable function $func to list $list
 * @param  callable $func function
 * @param  callable $list list
 * @return result list
 */
function map(callable $func, callable $list)
{
    $map = function ($items, $acc) use (&$map, $func) {
        if (is_null($items)) {
            return reverse($acc);
        }
        return $map(cdr($items), cons($func(car($items)), $acc));
    };

    return $map($list, null);
}

/**
 * Filters list $list using callable function $func
 * @param  callable $func function
 * @param  callable $list list
 * @return result list
 */
function filter(callable $func, callable $list)
{
    $map = function ($func, $items) use (&$map) {
        if ($items === null) {
            return null;
        } else {
            $curr = car($items);
            $rest = $map($func, cdr($items));
            // filter
            return $func($curr) ? cons($curr, $rest) : $rest;
        }
    };

    return $map($func, $list);
}

/**
 * Collapses the list $list using callable function $func
 * @param  callable $func function
 * @param  callable $list list
 * @param  mixed   $acc
 * @return result
 */
function reduce(callable $func, callable $list, $acc = null)
{
    $iter = function ($items, $acc) use (&$iter, $func) {
        return is_null($items) ? $acc : $iter(cdr($items), $func(car($items), $acc));
    };

    return $iter($list, $acc);
}

/**
 * Concatenates two lists
 * @param  pair $list1
 * @param  pair $list2
 * @return new list
 */
function append(callable $list1, callable $list2)
{
    if ($list1 === null) {
        return $list2;
    } else {
        return cons(car($list1), append(cdr($list1), $list2));
    }
}

/**
 * Reverse list $list
 * @param  callable $list list
 * @return result
 */
function reverse(callable $list)
{
    $iter = function ($items, $acc) use (&$iter) {
        return is_null($items) ? $acc : $iter(cdr($items), cons(car($items), $acc));
    };

    return $iter($list, null);
}

/**
 * Returns length of list
 * @param  callable $list list
 * @return integer  length
 */
function length($list)
{
    if ($list === null || !is_callable($list)) {
        return 0;
    } else {
        return 1 + length(cdr($list));
    }
}
