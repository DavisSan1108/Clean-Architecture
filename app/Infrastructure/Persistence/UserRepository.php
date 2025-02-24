<?php

namespace App\Infrastructure\Persistence;

use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Models\User as EloquentUser;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return EloquentUser::all();
    }

    public function create(array $data)
    {
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

        // Si se pasa una nueva contraseña, la encripta
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);
        return $user;
    }

    public function delete(int $id)
    {
        $user = EloquentUser::findOrFail($id);
        return $user->delete();
    }
}
