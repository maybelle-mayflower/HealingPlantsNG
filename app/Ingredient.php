<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name','recipe_id'];
    public function recipeid()
    {
        return $this->belongsTo('App\Recipes');
    }
}
