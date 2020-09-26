<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $fillable = ['nome', 'genero', 'classificacaoIndicativa'];
    public $timestamps = false;

    public function detalhes()
    {
        return $this->hasOne(Detalhes::class);
    }
}
