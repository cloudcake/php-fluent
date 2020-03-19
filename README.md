# PHP Fluent

Developer-experience focused string and array manipulation. Fluent is an
extremely thin wrapper around laravel/helpers that exposes two global functions
(`str()` and `arr()`) rather than the plethora of available helpers allowing use
of more fluent-like syntax.

If you hate the idea of more globally loaded functions, just stick to [laravel/helpers](https://github.com/laravel/helpers). It now has fluent-like syntax.

# Installation

**Laravel is NOT required to use this package.**

```shell
composer require cloudcake/php-fluent
```

# Usage

The full list of available methods are listed on the [Laravel Helpers
documentation](https://laravel.com/docs/master/helpers#available-methods),
however it is important to note the slight argument placement change. The
constructing data is always placed inside the helper function. This is to
provide a more consistent, readable syntax you won't forget.

Previously:

```php
use Illuminate\Support\Str;

Str::startsWith('This is my string', 'This'); // true

// or (New)

Str::of('This is my string')->startsWith('This'); // true
```

Currently:

```php
str('This is my string')->startsWith('This'); // true
```
