<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'SALAS';

    public function sesions(){
        return	$this->hasMany('App\Sesion','sala_id');
	}
}
