Lumen Auth Key
========

Manage api key access from .env file.

## Installation

Run `composer require ryanaby/lumen-auth-key`

In your `bootstrap/app.php` file, add the Lumen Auth Key provider to Register Service Providers blocks

```php
// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);
$app->register(Ryanaby\LumenAuthKey\Providers\AuthKeyServiceProvider::class);
```

## Add Keys

Add your key on `.env` file, you can add more than one key using pipe `|` as separator.

`AUTH_KEY=y0ur5ecur3K3y|an0th3rSecur3K3y`

## Usage

### Implementing Authorization

You can use middleware `auth.apikey` on your route.

```php
$router->get('api/post/1', ['middleware' => ['auth.apikey'], function () {
    //
}]);

```

### Pass Authentication

Request must have `X-auth-key` headers to have access your API endpoint.

    X-auth-key: y0ur5ecur3K3y

## Failed Authentication

The failed authentication will return 401 header

```json
{
    "errors": [
        {
            "message": "Unauthorized Access"
        }
    ]
}
```

Lumen Auth Key package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
