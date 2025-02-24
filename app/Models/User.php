<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // ✅ Campos que se pueden rellenar
    protected $fillable = ['name', 'email', 'password', 'rol'];

    // ✅ Ocultar campos sensibles
    protected $hidden = ['password'];
}
