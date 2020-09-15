<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Customer extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
           'firstname', 'lastname','email','phone','address','locked'
       ];

    public function hasCustomerRent()
    {
        return $this->hasMany('App\Model\CustomerRent', 'customer_id');
    }
}
