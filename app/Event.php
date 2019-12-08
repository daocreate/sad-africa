<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";
    protected $fillable = ['title', 'description' , 'color', 'start_date', 'end_date'];
}
