<?php

namespace App\Infrastructure\Persistence;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function findById(int $id)
    {
        return User::find($id);
    }

    public function update(int $id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
