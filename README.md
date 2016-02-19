# Laravel 5 Eleads Package

This package can send leads to Mixd Internet Eleads.
If you wish to use the eleads contact us => atendimento@mixd.com.br

## Requirements
This package currently requires Laravel 5

## Installation Laravel 5 
require by packagist

```js
  composer require mixdinternet/eleads: 1.0.*
```

Add on service provider array in app.php

```php
   'Mixdinternet\Eleads\EleadsServiceProvider',
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
token | String | .env('ELEADS_TOKEN')
nome | String | Lead Name
estado | String | State
cidade | String | City
email | String | Lead Email
telefone | String | Lead phone
descricao | String | Open text
custom1 | String | Open Text
custom2 | String | Open Text
heat | Integer | Relevance