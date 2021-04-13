<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'nombre_oficina',
        'responsable',
        'condicion'
    ];
    
    public function  expedientes()
    {
        return $this->hasMany(Expediente::class);     
    }    
}
