<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $table = 'SESIONS';

    public function sala() {
    	return $this->belongsTo('App\Sala','sala_id');
    }
}
