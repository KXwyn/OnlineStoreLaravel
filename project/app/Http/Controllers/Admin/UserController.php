<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with('roles')->paginate(10);

        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all(); // Obtenemos todos los roles
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validamos los datos, incluyendo la contraseña
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'roles' => 'nullable|array'
        ]);

        // Creamos el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encriptamos la contraseña
        ]);

        // Sincronizamos los roles
        $user->roles()->sync($request->roles ?? []);

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado exitosamente.');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) // Laravel inyecta el usuario automáticamente por su ID
    {
        // Obtenemos todos los roles para poder mostrarlos en el formulario
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validamos los datos básicos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'roles' => 'nullable|array' // Los roles pueden venir vacíos
        ]);

        // Actualizamos los datos del usuario
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Sincronizamos los roles
        // Si no se envía ningún rol, el array estará vacío y se quitarán todos los roles.
        $user->roles()->sync($request->roles ?? []);

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
         if ($user->id === 1) { // Suponiendo que el primer usuario es el superadmin
        return redirect()->route('admin.users.index')->withErrors('No puedes eliminar al administrador principal.');
    }

    // Primero, desvinculamos todos los roles para limpiar la tabla pivote.
    $user->roles()->sync([]);

    // Luego, eliminamos al usuario.
    $user->delete();

    // Redirigimos de vuelta con un mensaje de éxito.
    return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
