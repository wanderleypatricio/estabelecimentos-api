<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    protected $fillable = ['id', 'nome','telefone','email','rua','bairro','cidade','uf','cep','longitude','latitude','imagem'];
}
