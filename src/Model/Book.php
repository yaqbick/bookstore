<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Book extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
           'title', 'publisher_id', 'cover', 'price',
       ];

    public function hasPublisher()
    {
        return $this->hasOne('App\Model\Publisher', 'id');
    }
    public function hasAuthor()
    {
        return $this->belongsToMany('App\Model\Author', 'books_authors');
    }
    public function hasCustomerRent()
    {
        return $this->hasMany('App\Model\CustomerRent', 'id');
    }
}
