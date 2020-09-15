<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class CustomerRent extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
           'customer_id', 'book_id', 'startdate', 'enddate','fee','active','cash_penalty'
       ];

    public function hasCustomerRent()
    {
        return $this->belongsTo('App\Model\Customer', 'customer_id');
    }
    public function hasBook()
    {
        return $this->belongsTo('App\Model\Book', 'id');
    }
}
