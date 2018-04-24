<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    public function cliente(){
    	return $this->bellongsTo('App\Cliente');
    }

    public function addTelefone(Telefone $tel){
    	return $this->telefones()->save($tel);
    }
}
