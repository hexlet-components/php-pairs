# php-pairs

[![Build Status](https://travis-ci.org/hexlet-components/php-pairs.svg?branch=master)](https://travis-ci.org/hexlet-components/php-pairs)
[![Code Climate](https://codeclimate.com/github/hexlet-components/php-pairs/badges/gpa.svg)](https://codeclimate.com/github/hexlet-components/php-pairs)
[![Issue Count](https://codeclimate.com/github/hexlet-components/php-pairs/badges/issue_count.svg)](https://codeclimate.com/github/hexlet-components/php-pairs)

```sh
$ composer require hexlet/pairs
```


### Functions for working with Pairs

```php
<?php

use function PhpPairs\Pairs\cons;
use function PhpPairs\Pairs\car;
use function PhpPairs\Pairs\cdr;
use function PhpPairs\Pairs\toString;
```

### Functions for working with Lists

```php
<?php

use function PhpPairs\Lists\length;
use function PhpPairs\Lists\reverse;
use function PhpPairs\Lists\map;
use function PhpPairs\Lists\filter;
use function PhpPairs\Lists\reduce;
```

### Examples

```php
<?php

$pair = cons(1, 2);

$one = \PhpPairs\Pairs\car($pair); // $one = 1;
$two = \PhpPairs\Pairs\cdr($pair) // $two = 2;

$list = cons(1, cons(2, cons(3, cons(4, cons(5, cons(6, null))))));
$length = length($list); // $length = 6;

$filter = filter($list, function ($x) {
    return $x % 2 == 0;
});
$result = toString($filter); // $result = "(2, 4, 6)";
```
