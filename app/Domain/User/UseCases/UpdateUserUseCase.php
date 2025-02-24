<?php

namespace App\Domain\User\UseCases;

use App\Domain\User\Repositories\UserRepositoryInterface;
use Exception;

class UpdateUserUseCase
{
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Ejecuta el caso de uso para actualizar un usuario.
     */
    public function execute(int $id, array $data)
    {
        $user = $this->userRepo->findById($id);

        if (!$user) {
            throw new Exception("Usuario no encontrado con ID: $id");
        }

        return $this->userRepo->update($id, $data);
    }
}
