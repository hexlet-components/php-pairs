# php-pairs

[![github action status](https://github.com/hexlet-components/php-pairs/workflows/master/badge.svg)](https://github.com/hexlet-components/php-pairs/actions)

Functions for working with Pairs.

## Examples

```php
<?php

use function PhpPairs\Pairs\cons;
use function PhpPairs\Pairs\car;
use function PhpPairs\Pairs\cdr;
use function PhpPairs\Pairs\toString;

$pair = cons(1, 2);
$one = car($pair); // $one = 1;
$two = cdr($pair); // $two = 2;
$str = toString($pair); // '(1, 2)'
```

[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/hexletguides.github.io/master/images/hexlet_logo128.png)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=php-pairs)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet (in Russian)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=php-pairs).
