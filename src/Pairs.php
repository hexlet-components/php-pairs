<?php

namespace Pairs;

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

function car(callable $pair)
{
    return $pair("car");
}

function cdr(callable $pair)
{
    return $pair("cdr");
}

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

function isPair($pair)
{
    return is_callable($pair);
}
