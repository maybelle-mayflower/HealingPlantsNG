<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    protected $fillable = ['recipe_name', 'recipe_base_id','treatment_for','keywords','category_id', 'method'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
