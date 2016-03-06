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

    $arr = [];
    $iter = function ($items) use (&$arr, &$iter) {
        if ($items != null) {
            $arr[] = toString(car($items));
            $iter(cdr($items));
        }

    };
    $iter($list);

    return "(" . implode(", ", $arr) . ")";
}

function isPair($pair)
{
    return is_callable($pair);
}
