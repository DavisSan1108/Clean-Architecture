<?php

namespace App\Domain\User\UseCases;

use App\Domain\User\Repositories\UserRepositoryInterface;
use Exception;

class DeleteUserUseCase
{
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Ejecuta el caso de uso para eliminar un usuario por ID.
     */
    public function execute(int $id)
    {
        $user = $this->userRepo->findById($id);

        if (!$user) {
            throw new Exception("Usuario no encontrado con ID: $id");
        }

        return $this->userRepo->delete($id);
    }
}
