# php-pairs

[![github action status](https://github.com/hexlet-components/php-pairs/workflows/master/badge.svg)](https://github.com/hexlet-components/php-pairs/actions)

## Install

```sh
$ composer require hexlet/pairs
```

## Functions for working with Pairs

```php
<?php

use function PhpPairs\Pairs\cons;
use function PhpPairs\Pairs\car;
use function PhpPairs\Pairs\cdr;
use function PhpPairs\Pairs\toString;
```

## Functions for working with Lists

```php
<?php

use function PhpPairs\Lists\length;
use function PhpPairs\Lists\reverse;
use function PhpPairs\Lists\map;
use function PhpPairs\Lists\filter;
use function PhpPairs\Lists\reduce;
```

## Usage examples

```php
<?php

$pair = cons(1, 2);

$one = \PhpPairs\Pairs\car($pair); // $one = 1;
$two = \PhpPairs\Pairs\cdr($pair); // $two = 2;

$list = cons(1, cons(2, cons(3, cons(4, cons(5, cons(6, null))))));
$length = length($list); // $length = 6;

$filter = filter($list, function ($x) {
    return $x % 2 == 0;
});
$result = toString($filter); // $result = "(2, 4, 6)";
```

[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/hexletguides.github.io/master/images/hexlet_logo128.png)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=php-eloquent-blog)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet (in Russian)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=php-eloquent-blog).
