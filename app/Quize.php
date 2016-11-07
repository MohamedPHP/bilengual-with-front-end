<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quize extends Model
{
    public function level(){
        return $this->belongsTo('App\Level');
    }
    public function games(){
        return $this->hasMany('App\Game');
    }
}
