<?php

namespace App\Domain\User\Entities;

class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $rol;

    public function __construct($id, $name, $email, $password, $rol)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }
}
