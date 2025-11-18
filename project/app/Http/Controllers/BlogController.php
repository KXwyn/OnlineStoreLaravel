<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Muestra la página principal de la sección de Blogs.
     */
    public function index()
    {
        // En el futuro aquí obtendrás los blogs de la base de datos,
        // pero por ahora, solo mostramos la vista.
        return view('blogs.index');
    }
}
