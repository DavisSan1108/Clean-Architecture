<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // ✅ Define los campos que se pueden llenar con create()
    protected $fillable = ['name', 'email', 'password', 'rol'];

    // ✅ Oculta la contraseña en las respuestas JSON
    protected $hidden = ['password'];
}
