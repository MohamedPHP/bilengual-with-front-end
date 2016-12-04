<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function quize(){
        return $this->belongsTo('App\Quize');
    }
    public function rounds(){
        return $this->hasMany('App\Round');
    }
}
