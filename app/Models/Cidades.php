<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidades extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'nome',
        'estado'
    ];

    public function medico(): HasMany
    {
        return $this->hasMany(Medico::class, 'cidades_id', 'id');
    }
}
