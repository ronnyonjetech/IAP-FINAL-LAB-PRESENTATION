<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function car(){
        return $this->belongsTo('App\Car');
    }
}
