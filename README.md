# Laravel 5.1 Eleads Package

This package can send leads to Mixd Internet Eleads.
If you wish to use the eleads contact us => atendimento@mixd.com.br

> **NOTE** If you are using Laravel 5.0, then use the v1.0.0 branch or tagged `2.0.*` releases.

## Requirements
This package currently requires Laravel >= 5.1

## Installation Laravel >= 5.1 
require by packagist

```js
  composer require mixdinternet/eleads
```

Add on service provider array in app.php

```php
   Mixdinternet\Eleads\EleadsServiceProvider::class,
```

Send lead

```php
   \Eleads::send($yourRequestInstance);
```

To queue


```php
   \Eleads::toQueue($yourRequestInstance);
```