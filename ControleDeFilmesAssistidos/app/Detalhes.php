<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalhes extends Model
{
    protected $fillable = ['data', 'quem_indicou', 'avaliacao', 'comentario'];
    public $timestamps = false;
    public function detalhes(){
        return $this->belongsTo(Filme::class);
    }
}
