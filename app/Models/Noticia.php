<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'texto', 'foto', 'data', 'fonte', 'manchete', 'user_id', 'categoria_id'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
