<?php

return [

    'models' => [

        /*
         * Specifies which model should serve as the
         * author. By default the standard user model is used.
         */

        'author' => \App\User::class,

        /*
         * When using the 'hasReviews' the model specified in here
         * is used to retrieve your reviews. You may use any model you like.
         *
         * Note: your own model needs to implement
         * the `Naoray\LaravelRateable\Contracts\Review' contract.
         */

        'review' => \Naoray\LaravelReviewable\Models\Review::class,
    ],

    /*
     * Specifies which table name will be used to store scores.
     */

    'reviews_table_name' => 'reviews',
];
