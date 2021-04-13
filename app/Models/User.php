<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use  HasFactory, Notifiable;

 

    protected $fillable = [
        'id', 'usuario', 'password','condicion','idrol'
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  
    public function rol(){
        return $this->belongsTo(Role::class);
    }

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function expedientes(){
        return $this->belongsToMany(Expediente::class);
    }
}
