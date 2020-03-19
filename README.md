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

### Case-insensitivity `ignoreCasing()`

Sometimes it's useful to call helpers ignoring the casing of strings, you can do this by chaining `->ignoreCasing()` before executing the function on the string. This provides a cleaner solution than changing the casing on every string yourself.

Example:

```php
str('tHiS is my string')->ignoreCasing()->startsWith('THIS'); // Returns true
str('tHiS is my string')->startsWith('THIS'); // Returns false
```

### Mutliple calls `produce(3)`

There may be instances where you need to execute the same thing 10 times, for example let's say you need to generate 10 UUID's, rather than calling the function 10 times, you may use `produce(10)` method.

Example:

```php
str()->produce(10)->uuid();

// Returns
// Array
// (
//     [0] => fc91fe0a-4254-4792-9604-e5fbf223d0a7
//     [1] => bdc0e4a1-86ca-4dba-ae95-ac4a2ad639d0
//     [2] => 95b06669-3262-4dfa-a9c3-69fc3251f94c
//     [3] => f0b2aec6-fb86-4beb-bdf2-74ddb25ff440
//     [4] => 2d0c02a0-2ec8-402f-b6eb-a1ce83f4e343
//     [5] => e0cc9098-cebf-42ec-89b2-8942930f0293
//     [6] => 2efba194-e2c7-48c7-965d-9efc963edf06
//     [7] => 8e010b42-1664-4272-be2f-90402010866d
//     [8] => ec668d35-ffd4-4b59-bd11-204fd193f6e8
//     [9] => e74a5362-e272-4af6-ba07-3d1f4352d653
// )
```
