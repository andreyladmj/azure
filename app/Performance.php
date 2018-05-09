<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Performance extends Model{

    // you can use trait


    // value object
    public function getRevenueAttribute($value)
    {
        return new Revenue($value);
    }


    public function bank()
    {
        //return new someBank($this);
    }
}