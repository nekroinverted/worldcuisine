<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientTranslation extends Model
{
    protected $fillable = ['title', 'slug'];
    public $timestamps = false;
}
