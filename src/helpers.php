<?php

use Illuminate\Database\Eloquent\Model;
use Naoray\LaravelReviewable\Models\Review;
use Naoray\LaravelReviewable\ReviewFactory;

if (!function_exists('review')) {
    /**
     * Create a review for a model.
     *
     * @param Model      $model
     * @param int        $score
     * @param string     $body
     * @param Model|null $author
     */
    function review(Model $model, $score, $body = null, Model $author = null)
    {
        return ReviewFactory::create($model, $score, $body, $author);
    }
}
