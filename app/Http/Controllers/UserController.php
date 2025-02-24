<?php

namespace App\Http\Controllers;

use App\Domain\User\UseCases\CreateUserUseCase;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $createUserUseCase;

    public function __construct(CreateUserUseCase $createUserUseCase)
    {
        $this->createUserUseCase = $createUserUseCase;
    }

    /**
     * Maneja la solicitud POST para crear un nuevo usuario.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
            'rol' => 'required|string|in:admin,user',
        ]);

        $user = $this->createUserUseCase->execute($validated);

        return response()->json(['success' => true, 'data' => $user], 201);
    }
}
