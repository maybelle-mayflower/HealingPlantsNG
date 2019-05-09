<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug','details','price', 'image', 'in_stock'];



    public function PresentPrice(){
        return '₦' + number_format( $this->price, 2);
    }

    public function nameToLowerCase(){
        return strtolower($this->name);
    }
}
