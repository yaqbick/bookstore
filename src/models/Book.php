<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Book extends Eloquent
{

       /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
    protected $fillable = [
           'title', 'publisher_id', 'cover','price'
       ];

    public function todo()
    {
        return $this->hasMany('Publisher');
    }
}
