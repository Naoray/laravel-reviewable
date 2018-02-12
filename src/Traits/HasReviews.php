<?php

namespace Naoray\LaravelReviewable\Traits;

use Naoray\LaravelReviewable\Models\Review;
use Naoray\LaravelReviewable\ReviewFactory;

trait HasReviews
{
    /**
     * Get all reviews of this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reviews()
    {
        return $this->morphMany(
            config('reviewable.models.review'), 'reviewable'
        );
    }

    /**
     * Get the summerized score value.
     *
     * @return int
     */
    public function getScoreAttribute()
    {
        return $this->reviews->sum('score');
    }

    /**
     * Get the average score value.
     *
     * @return int
     */
    public function getAvgScoreAttribute()
    {
        return $this->reviews()->avg('score');
    }

    /**
     * Create a review for this model.
     *
     * @param int    $score
     * @param string $body
     * @param model  $author
     *
     * @return Review
     */
    public function createReview($score, $body = null, $author = null)
    {
        return ReviewFactory::create($this, $score, $body, $author);
    }
}
