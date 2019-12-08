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
        return $this->hasMany(Formation::class); //'formation_id'
    }

    protected $fillable = [
        'name',
        'description',
    ];
}
