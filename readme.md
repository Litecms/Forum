This is a Litecms package that provides forum management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/forum`.

    "litecms/forum": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Litecms\Forum\Providers\ForumServiceProvider::class,

```

And also add it to alias

```php
'Forum'  => Litecms\Forum\Facades\Forum::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Litecms\Forum\Providers\ForumServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Litecms\Forum\Providers\ForumServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Litecms\Forum\Providers\ForumServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Litecms\Forum\Providers\ForumServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Litecms\Forum\Providers\ForumServiceProvider" --tag="view"

Public folders

php artisan vendor:publish --provider="Litecms\Forum\Providers\ForumServiceProvider" --tag="public"
    

Publish admin views only if it is necessary.

## Usage


