# PHP Fluent

Developer-experience focused string and array manipulation. Fluent is an
extremely thin wrapper around laravel/helpers that exposes two global functions
(`str()` and `arr()`) rather than the plethora of available helpers allowing use
of more fluent-like syntax.

# Installation

**Laravel is NOT required to use this package.**

`composer require cloudcake/php-fluent`

# Usage

The full list of available methods are listed on the [Laravel Helpers
documentation](https://laravel.com/docs/master/helpers#available-methods),
however it is important to note the slight argument placement change. The
constructing data is always placed inside the helper function. This is to
provide a more consistent, readable syntax you won't forget.

Previously:

```php
<?php

use Illuminate\Support\Str;

Str::startsWith('This is my string', 'This'); // true
```

Currently:

```php
<?php

str('This is my string')->startsWith('This'); // true
```

# Some Examples

## Strings

```php
<?php

str('I am error')->after('I '); // 'am error'
str()->uuid(); // UUID
str()->orderedUuid(); // Ordered UUID
```

## Arrays

```php
<?php
$array = [
    'this' => [
        'is' => [
            'a' => [
                'nested' => [
                    'array' => 'yes'
                ]
            ]
        ]
    ],
    'and' => 'this is not',
];

arr($array)->dot();
// Array
// (
//     [this.is.a.nested.array] => yes
//     [and] => this is not
// )
```
