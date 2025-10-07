<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountingController extends Controller
{
    /**
     * Iniciar sesión (estructura base)
     */
    public function login(Request $request)
    {
        // Aquí se  validan las credenciales en el futuro
        return response()->json([
            'message' => 'Función para iniciar sesión'
        ]);
    }

    /**
     * Cerrar sesión
     */
    public function logout()
    {
        // Aquí se implementa la lógica para cerrar sesión
        return response()->json([
            'message' => 'Función para cerrar sesión'
        ]);
    }

    /**
     * Cambiar contraseña
     */
    public function changePassword(Request $request)
    {
        // Lógica de cambio de contraseña  después
        return response()->json([
            'message' => 'Función para cambiar contraseña'
        ]);
    }

    /**
     * Ver perfil de usuario
     */
    public function viewProfile($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'error' => 'Usuario no encontrado'
            ], 404);
        }

        return response()->json($user);
    }

    /**
     * Actualizar información de usuario
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'error' => 'Usuario no encontrado'
            ], 404);
        }

        $user->update($request->all());

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'user' => $user
        ]);
    }
}
