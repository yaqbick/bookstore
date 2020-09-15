<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Publisher extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
           'name',
       ];

    public function book()
    {
        return $this->belongsTo('App\Model\Book');
    }
}
