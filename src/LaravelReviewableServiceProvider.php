<?php

namespace Naoray\LaravelReviewable;

use Illuminate\Support\ServiceProvider;

class LaravelReviewableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'../config/reviewable.php' => config_path('reviewable.php'),
        ]);

        if (! class_exists('CreateReviewsTable')) {
            $timestamp = date('Y_m_d_His', time());
            
            $this->publishes([
                __DIR__.'/../database/migrations/create_reviews_table.php.stub' => $this->app->databasePath()."/migrations/{$timestamp}_create_reviews_table.php",
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/reviewable.php', 'reviewable'
        );
    }
}
