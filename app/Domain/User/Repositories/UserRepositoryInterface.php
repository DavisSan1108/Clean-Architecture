<?php

namespace App\Domain\User\Repositories;

interface UserRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function findById(int $id);
    public function update(int $id, array $data);
    public function delete(int $id);
}
