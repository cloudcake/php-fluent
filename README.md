# PHP Fluent

Developer-experience focused string and array manipulation. Fluent is an
extremely thin wrapper around laravel/helpers with some extras that exposes two global functions
(`str()` and `arr()`) rather than the plethora of available helpers allowing use
of more fluent-like syntax.

If you hate the idea of more globally loaded functions, just stick to [laravel/helpers](https://github.com/laravel/helpers). It now has fluent-like syntax.

# Installation

**Laravel is NOT required to use this package.**

```shell
composer require cloudcake/php-fluent
```

# Usage

It is important to note the slight argument placement change from the laravel/helpers package. The
constructing data is always placed inside the helper function. This is to
provide a more consistent, readable syntax you won't forget.

Example:
```php
str('This is my string')->startsWith('This'); // true
```

Usage of helpers follows this syntax for all [string helpers](https://github.com/laravel/docs/blob/master/helpers.md#strings-1) as well as [array helpers](https://github.com/laravel/docs/blob/master/helpers.md#arrays--objects-1), the only exceptions being where an argument isn't required, for example `str()->random()` or `str()->uuid()`.

# Extras

### Case-insensitive calls

Sometimes it's useful to call helpers ignoring the casing of strings, you can do this by chaining `->ignoreCasing()` before executing the function on the string.

Example:

```php
str('tHiS is my string')->ignoreCasing()->startsWith('THIS'); // Returns true
str('tHiS is my string')->startsWith('THIS'); // Returns false
```
