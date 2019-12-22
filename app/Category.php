<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Formation;
class Category extends Model
{
    /**
     * Get the categories for the page formation.
     */
    public function formations(){
        return $this->hasMany('App\Formation');
    }

    protected $fillable = [
        'name',
        'description',
    ];
}
