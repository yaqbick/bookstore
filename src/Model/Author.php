<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Author extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
           'firstname', 'lastname',
       ];

    public function hasBook()
    {
        return $this->belongsToMany('App\Model\Book', 'books_authors');
    }
}
