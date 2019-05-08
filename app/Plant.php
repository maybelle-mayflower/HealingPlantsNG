<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = ['name', 'slug','details','description', 'image'];



    public function PresentPrice(){
        return '₦' ;//. number_format( $this->price, 2);
    }

    public function nameToLowerCase(){
        return strtolower($this->name);
    }
}
