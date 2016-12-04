<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function round(){
        return $this->belongsTo('App\Game');
    }
    public function answers(){
        return $this->hasMany('App\Answer');
    }
}
