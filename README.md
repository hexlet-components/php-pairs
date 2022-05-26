# php-pairs

[![github action status](https://github.com/hexlet-components/php-pairs/workflows/PHP%20CI/badge.svg)](../../actions)

Functions for working with Pairs.

## Examples

```php
<?php

use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\cdr;
use function Php\Pairs\Pairs\toString;

$pair = cons(1, 2);
$one = car($pair); // $one = 1;
$two = cdr($pair); // $two = 2;
$str = toString($pair); // '(1, 2)'
```

---

[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/assets/master/images/hexlet_logo128.png)](https://hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=php-pairs)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet](https://hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=php-pairs).

See most active contributors on [hexlet-friends](https://friends.hexlet.io/).
