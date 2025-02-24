<?php

namespace App\Http\Controllers;

use App\Domain\User\UseCases\CreateUserUseCase;
use App\Domain\User\UseCases\GetUserUseCase;
use App\Domain\User\UseCases\DeleteUserUseCase;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    private $createUserUseCase;
    private $getUserUseCase;
    private $deleteUserUseCase;

    public function __construct(
        CreateUserUseCase $createUserUseCase, 
        GetUserUseCase $getUserUseCase, 
        DeleteUserUseCase $deleteUserUseCase
    ) {
        $this->createUserUseCase = $createUserUseCase;
        $this->getUserUseCase = $getUserUseCase;
        $this->deleteUserUseCase = $deleteUserUseCase;
    }

    /**
     * Maneja la solicitud GET para obtener todos los usuarios.
     */
    public function index()
    {
        $users = $this->getUserUseCase->execute();

        return response()->json([
            'success' => true,
            'data' => $users
        ], 200);
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

    /**
     * Maneja la solicitud DELETE para eliminar un usuario.
     */
    public function destroy($id)
    {
        try {
            $this->deleteUserUseCase->execute($id);

            return response()->json([
                'success' => true,
                'message' => "Usuario con ID $id eliminado exitosamente."
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 404);
        }
    }
}
