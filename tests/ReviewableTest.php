<?php

namespace Naoray\LaravelReviewable\Test;

use Naoray\LaravelReviewable\Models\Review;

class ReviewableTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->userToReview = User::create(['email' => 'reviewed@test.com']);
	}

	/** @test */
	function it_can_review_models()
	{
	    review($this->userToReview, 10, '', $this->testUser);

	    $review = Review::first();
	    $this->assertNotNull($review);
	    $this->assertEquals(10, $review->score);
	    $this->assertEquals($this->testUser, $review->author);
	    $this->assertEquals($this->userToReview->fresh(), $review->reviewable);
	}

	/** @test */
	function it_can_get_reviewed_by_loged_in_users()
	{
	    \Auth::login($this->testUser);

	    $this->userToReview->createReview(5, 'Example review text');

	    $firstReview = Review::find(1);
	    $this->assertNotNull($firstReview);
	    $this->assertEquals('Example review text', $firstReview->body);
	    $this->assertEquals($this->testUser, $firstReview->author);
	    $this->assertEquals($this->userToReview->fresh(), $firstReview->reviewable);
	}

	/** @test */
	function it_can_get_the_total_score_of_all_reviews()
	{
	    review($this->userToReview, 10, '', $this->testUser);
	    review($this->userToReview, 1, '', $this->testUser);
	    review($this->userToReview, 5, '', $this->testUser);
	    review($this->userToReview, 8, '', $this->testUser);

	    $this->assertEquals(24, $this->userToReview->fresh()->score);
	}

	/** @test */
	function it_can_get_the_average_score_of_all_reviews()
	{
	    review($this->userToReview, 10, '', $this->testUser);
	    review($this->userToReview, 1, '', $this->testUser);
	    review($this->userToReview, 5, '', $this->testUser);
	    review($this->userToReview, 8, '', $this->testUser);

	    $this->assertEquals(6, $this->userToReview->fresh()->avg_score);
	}
}