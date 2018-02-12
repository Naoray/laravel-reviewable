<?php

namespace Naoray\LaravelReviewable\Test;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Naoray\LaravelReviewable\Traits\HasReviews;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthorizableContract, AuthenticatableContract
{
    use HasReviews, Authorizable, Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email'];

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'users';
}