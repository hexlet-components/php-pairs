# php-pairs

[![Build Status](https://travis-ci.org/hexlet-components/php-pairs.svg?branch=master)](https://travis-ci.org/hexlet-components/php-pairs)
[![Code Climate](https://codeclimate.com/github/hexlet-components/php-pairs/badges/gpa.svg)](https://codeclimate.com/github/hexlet-components/php-pairs)
[![Issue Count](https://codeclimate.com/github/hexlet-components/php-pairs/badges/issue_count.svg)](https://codeclimate.com/github/hexlet-components/php-pairs)


### Functions for working with Pairs
```
use function Pairs\cons;
use function Pairs\car;
use function Pairs\cdr;
use function Pairs\toString;
```

### Functions for working with Lists
```
use function Lists\length;
use function Lists\reverse;
use function Lists\map;
use function Lists\filter;
use function Lists\reduce;
```
### example
\# 1
```
$pair = cons(1, 2);

$one = Pairs\car($pair); // $one = 1;
$two = Pairs\cdr($pair) // $two = 2;
```
\# 2
```
$list = cons(1, cons(2, cons(3, cons(4, cons(5, cons(6, null))))));
$length = length($list); // $length = 6;

$filter = filter(function ($x) {
    return $x % 2 == 0;
}, $list);
$result = toString($filter); \\ $result = "(2, 4, 6)";
```
