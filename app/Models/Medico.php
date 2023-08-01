<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'nome',
        'especialidade',
        'cidades_id'
    ];

    public function cidades(): HasOne
    {
        return $this->hasOne(Cidades::class);
    }

    public function paciente(): BelongsToMany
    {
        return $this->belongsToMany(Paciente::class);
    }
}
