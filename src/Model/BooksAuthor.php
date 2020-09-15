<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class BooksAuthor extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
           'author_id', 'book_id',
       ];

    // public function hasPublisher()
    // {
    //     return $this->hasOne('App\Model\Publisher', 'id');
    // }
}
