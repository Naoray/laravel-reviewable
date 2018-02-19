# laravel-reviewable

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://travis-ci.org/Naoray/laravel-reviewable.svg?branch=master&style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/naoray/laravel-reviewable.svg?style=flat-square)](https://packagist.org/packages/naoray/laravel-reviewable)
[![StyleCI](https://styleci.io/repos/121157590/shield?branch=master)](https://styleci.io/repos/121157590)

This package adds a reviewable feature to your app.

## Install
`composer require naoray/laravel-reviewable`

*publish config:* `php artisan vendor:publish --provider=Naoray\LaravelReviewable\LaravelReviewableServiceProvider`

## Usage
First, add the `Naoray\LaravelReviewable\Traits\HasReviews` trait to your model you want to add reviews to.
```php
use Naoray\LaravelReviewable\Traits\HasReviews;

class Post extends Model
{
    use HasReview;

    // ...
}
```

Now you can create a review by:
```php
// from reviewable entity
Post::first()->createReview(5, 'Example review text', $author);

// author is assumed to be logged in and executing this operation
Post::first()->createReview(10);

// with helper
review($post, 5, 'Example Text', $author);
```

and receive review scores by:
```php
// summarizes all scores
Post::first()->score;

// gives the average of all scores
Post::first()->avg_score;
```

## Testing
Run the tests with:

``` bash
vendor/bin/phpunit
```

## Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security
If you discover any security-related issues, please email krishan.koenig@googlemail.com instead of using the issue tracker.

## License
The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.
