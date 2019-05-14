<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function noticias();
    {
    	return $this->hasMany('App\Noticia');
    }
}
