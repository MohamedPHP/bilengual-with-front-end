<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function game(){
        return $this->belongsTo('App\Game');
    }
    public function answers(){
        return $this->hasMany('App\Answer');
    }
}
