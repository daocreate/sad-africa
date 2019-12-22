<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{

    protected $fillable = [
        'amount',
        'code',
        'delay',
        'date_inscription',
        'learner_id',
        'formation_id'
    ];

    public function tranches(){
        return $this->hasMany('App\Tranche');
    }
    public function formation(){
        return $this->belongsTo('App\Formation');
    }
    public function learner(){
        return $this->belongsTo('App\User');
    }
}
