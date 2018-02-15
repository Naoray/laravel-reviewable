<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = config('reviewable.reviews_table_name');

        Schema::create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->morphs('reviewable');
            $table->integer('score');
            $table->text('body')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableName = config('rateable.reviews_table_name');

        Schema::drop($tableName);
    }
}