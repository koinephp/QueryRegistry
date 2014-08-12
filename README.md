Koine Query Registry
--------------------------------------------------------------------------------

Simple registry for storing the executede queries so they can be logged/debbuged

Code information:

[![Build Status](https://travis-ci.org/koinephp/QueryRegistry.png?branch=master)](https://travis-ci.org/koinephp/QueryRegistry)
[![Coverage Status](https://coveralls.io/repos/koinephp/QueryRegistry/badge.png)](https://coveralls.io/r/koinephp/QueryRegistry)
[![Code Climate](https://codeclimate.com/github/koinephp/QueryRegistry.png)](https://codeclimate.com/github/koinephp/QueryRegistry)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/koinephp/QueryRegistry/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/koinephp/QueryRegistry/?branch=master)

Package information:

[![Latest Stable Version](https://poser.pugx.org/koine/queryregistry/v/stable.svg)](https://packagist.org/packages/koine/queryregistry)
[![Total Downloads](https://poser.pugx.org/koine/queryregistry/downloads.svg)](https://packagist.org/packages/koine/queryregistry)
[![Latest Unstable Version](https://poser.pugx.org/koine/queryregistry/v/unstable.svg)](https://packagist.org/packages/koine/queryregistry)
[![License](https://poser.pugx.org/koine/queryregistry/license.svg)](https://packagist.org/packages/koine/queryregistry)

### Usage

```php
$registry = new \Koine\QueryRegistry;

$registry->register("SELECT foo FROM bar");

$registry->register("SELECT foo FROM bar WHERE baz=:baz", array(
    'baz' => 'somevalue'
));

$registry->getQueries()->last()->dump();


// or

foreach ($registry->getQueries() as $query) {
    $db->execute($query->getSql(), $query->getParams());
}
```

### Installing

#### Via Composer
Append the lib to your requirements key in your composer.json.

```javascript
{
    // composer.json
    // [..]
    require: {
        // append this line to your requirements
        "koine/queryregistry": "dev-master"
    }
}
```

### Alternative install
- Learn [composer](https://getcomposer.org). You should not be looking for an alternative install. It is worth the time. Trust me ;-)
- Follow [this set of instructions](#installing-via-composer)

### Issues/Features proposals

[Here](https://github.com/koinephp/QueryRegistry/issues) is the issue tracker.

### Contributing

Only TDD code will be accepted. Please follow the [PSR-2 code standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md).

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request

### How to run the tests:

```bash
phpunit --configuration tests/phpunit.xml
```

### To check the code standard run:

```bash
phpcs --standard=PSR2 lib
phpcs --standard=PSR2 tests
```

### Lincense
[MIT](MIT-LICENSE)

### Authors

- [Marcelo Jacobus](https://github.com/mjacobus)
