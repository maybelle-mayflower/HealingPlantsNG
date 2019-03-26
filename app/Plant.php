<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    public function PresentPrice(){
        return '₦' . number_format( $this->price, 2);
    }

    public function nameToLowerCase(){
        return strtolower($this->name);
    }
}
