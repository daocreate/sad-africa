<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tranche extends Model
{
    /**
     * Get the Tranche for the page Inscription.
     */
    public function inscription(){
        return $this->belongsTo('App\Inscription');
    }

    protected $fillable = [
        'amount',
        'inscription_id',
        'date'
    ];
}
