<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['email', 'recipientname','quantity', 
    'amount', 'reference','shoppingcart','deliveryaddress','state','comments', 'mobileno', 'paymentstatus', 'deliverystatus'];

    public function ordereditem(){
        return $this->hasMany('App\Ordereditem');
    }
}
