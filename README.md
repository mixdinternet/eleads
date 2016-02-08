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

## Fields

> **NOTE** Only the token is required

Field | Value | Description
------|-------|------------
token | String | identifies the client
nome | String | Lead Name
estado | String | State
cidade | String | City
email | String | Lead Email
telefone | String | Lead phone
descricao | String | Open text
custom1 | String | Open Text
custom2 | String | Open Text
heat | Integer | Relevance