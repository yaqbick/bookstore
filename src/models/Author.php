<?php

namespace app\models;

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

    // public function hasPublisher()
    // {
    //     return $this->hasOne('app\models\Publisher', 'id');
    // }
}
