<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public function categoria()
    {
    	return $this->belongsTo('App\Categoria');
    }
}
