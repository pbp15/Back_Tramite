<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Expediente extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'iduser',
        'idexpediente',
        'idoficina',
        'estado',
        'fecha',
        'condicion'
    ];
    
}
