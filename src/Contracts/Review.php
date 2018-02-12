<?php

namespace Naoray\LaravelReviewable\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Review
{
    /**
     * Get the author of the review.
     */
    public function author();

    /**
     * Get the reviewable item.
     */
    public function reviewable();

    /**
     * Writes a review for a model to the db.
     *
     * @param Model      $model
     * @param int        $score
     * @param string     $body
     * @param Model|null $author
     */
    public static function write(Model $model, $score, $body = null, Model $author = null);
}
