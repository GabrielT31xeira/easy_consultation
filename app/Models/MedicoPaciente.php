<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicoPaciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "medico_paciente";
    protected $fillable = [
        'id',
        'medico_id',
        'paciente_id'
    ];
}
