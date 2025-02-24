<?php

namespace App\Infrastructure\Persistence;

use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Models\User as EloquentUser; // ✅ Usa el modelo Eloquent para acceder a métodos como create()

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return EloquentUser::all();
    }

    public function create(array $data)
    {
        // ✅ Usa el modelo Eloquent para crear el usuario
        return EloquentUser::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'rol' => $data['rol'],
        ]);
    }

    public function findById(int $id)
    {
        return EloquentUser::find($id);
    }

    public function update(int $id, array $data)
    {
        $user = EloquentUser::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id)
    {
        $user = EloquentUser::findOrFail($id);
        return $user->delete();
    }
}
