# White PHP

White makes accepting payments in the Middle East ridiculously easy. Sign up for an account at [http://whitepayments.com](whitepayments.com).

## Getting Started

Using White with your PHP project is simple. If you're using Composer (and really, who isn't amirite?), you just need to add one line to your `composer.json` file:

```json
{
    "require": {
        "white/white": "1.*"
    }
}
```

Now, running `php composer.phar install` will pull the library directly to your local folder.

## Using White

You'll need an account with White if you don't already have one (grab one real quick at [http://whitepayments.com](whitepayments.com) and come back .. we'll wait).

Got an account? Great .. let's get busy.

### 1. Initializing White

To get started, you'll need to initialize White with your secret API key. Here's how that looks:

```php
require_once('vendor/autoload.php'); # At the top of your PHP file

# Initialize White object
White::setApiKey('sk_d8e8fca2dc0f896fd7cb4cb0031ba249');
```

That's it! You probably want to do something with the White object though -- it gets really bored when it doesn't have anything to do. 

Let's run a transaction, shall we.

### 2. Processing a transaction through White