<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordereditem extends Model
{
    protected $fillable = ['orderid', 'product_name', 'product_price', 'qty'];
    public function orders(){
        return $this->belongsTo('App\Orders');
    }
}
