<?php

namespace Naoray\LaravelReviewable;

use Illuminate\Database\Eloquent\Model;
use Naoray\LaravelReviewable\Models\Review;

class ReviewFactory
{
	/**
	 * Create a review model and all associative relationships.
	 * 
	 * @param  Model  $model
	 * @param  int $score
	 * @param  string $body
	 * @param  Model  $author
	 * @return Review
	 */
	public static function create(Model $model, $score, $body = null, Model $author = null)
	{
		if (! $author) {
			$author = \Auth::user();
		}

		$review = new Review([
			'score' => $score,
			'body' => $body,
		]);

		$review->author()->associate($author);
		$review->reviewable()->associate($model);
		$review->save();

		return $review;
	}
}