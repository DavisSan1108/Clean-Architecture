<?php

namespace App\Domain\User\UseCases;

use App\Domain\User\Repositories\UserRepositoryInterface;

class GetUserUseCase
{
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Ejecuta el caso de uso para obtener todos los usuarios.
     */
    public function execute()
    {
        return $this->userRepo->getAll();
    }
}
