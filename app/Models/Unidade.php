<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = ['cidade', 'endereco'];

    /** @use HasFactory<\Database\Factories\UnidadeFactory> */
    use HasFactory;

    public function produtos(){
        return $this->hasMany(Produto::class);
    }
}
