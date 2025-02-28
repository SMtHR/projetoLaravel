<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'preco', 'unidade_id'];

    /** @use HasFactory<\Database\Factories\ProdutosFactory> */
    use HasFactory;
    
    public function unidade(){
        return $this->belongsTo(Unidade::class);
    }
}
