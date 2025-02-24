<?php

namespace App\Domain\User\UseCases;

use App\Domain\User\Repositories\UserRepositoryInterface;

class CreateUserUseCase
{
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function execute(array $data)
    {
        // ✅ Asegúrate que el campo 'nombre' está presente
        if (!isset($data['name'])) {
            throw new \Exception("El campo 'name' es obligatorio.");
        }

        return $this->userRepo->create($data);
    }
}
