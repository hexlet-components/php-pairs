<?php

namespace PhpPairs\Lists;

use function PhpPairs\Pairs\cons;
use function PhpPairs\Pairs\car;
use function PhpPairs\Pairs\cdr;
use function PhpPairs\Pairs\toString;

/**
 * Creates new list with given $elements
 * @param mixed[] $elements elements to add
 * @return callable list
 */
function l(...$elements)
{
    return array_reduce(array_reverse($elements), function ($acc, $item) {
        return cons($item, $acc);
    });
}

/**
 * Applies callable function $func to list $list
 * @param  callable $list list
 * @param  callable $func function
 * @return callable list
 */
function map($list, callable $func)
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
 * @param  callable $list list
 * @param  callable $func function
 * @return callable list
 */
function filter($list, callable $func)
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
 * @param  callable $list list
 * @param  callable $func function
 * @param  mixed   $acc
 * @return mixed
 */
function accumulate($list, callable $func, $acc = null) {
    return reduce($list, $func, $acc);
}

/**
 * Collapses the list $list using callable function $func
 * @param  callable $list list
 * @param  callable $func function
 * @param  mixed   $acc
 * @return mixed
 */
function reduce($list, callable $func, $acc = null)
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
 * @return callable new list
 */
function append($list1, $list2)
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
 * @return callable result
 */
function reverse($list)
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
