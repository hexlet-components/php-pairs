<?php

namespace Lists;
use function Pairs\cons;
use function Pairs\car;
use function Pairs\cdr;
use function Pairs\toString;


/**
 * применяет callable-функцию $func к списку $list
 * @method map
 * @param  callable $func функция
 * @param  callable $list список
 * @return [type]         [description]
 */
function map(callable $func, callable $list) {
    $map = function ($items, $acc) use (&$map, $func) {
        if (is_null($items)) {
            return reverse($acc);
        }
        return $map(cdr($items), cons($func(car($items)), $acc));
    };

    return $map($list, null);
}

/**
 * фильтрует список с помощью callable-функции
 * @method filter
 * @param  callable $func функция
 * @param  callable $list список
 * @return [type]         [description]
 */
function filter(callable $func, callable $list) {
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
 * сворачивает список с помощью callable-функции
 * @method reduce
 * @param  callable $func функция
 * @param  callable $list список
 * @param  mixed   $acc
 * @return [type]         [description]
 */
function reduce(callable $func, callable $list, $acc = null) {
    $iter = function ($items, $acc) use (&$iter, $func) {
        return is_null($items) ? $acc : $iter(cdr($items), $func(car($items), $acc));
    };

    return $iter($list, $acc);
}

/**
 * соединяет два списка
 * @method append
 * @param  pair $list1
 * @param  pair $list2
 * @return новый список
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
 * переворачивает список
 * @method reverse
 * @param  callable $list список
 * @return перевернутый список
 */
function reverse(callable $list) {
    $iter = function ($items, $acc) use (&$iter) {
        return is_null($items) ? $acc : $iter(cdr($items), cons(car($items), $acc));
    };

    return $iter($list, null);
}

/**
 * возвращает длинну списка
 * @method length
 * @param  callable $list список
 * @return integer        длинна списка
 */
function length($list) {
    if ($list === null || !is_callable($list)) {
        return 0;
    } else {
        return 1 + length(cdr($list));
    }
}
