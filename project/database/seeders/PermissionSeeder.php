<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Sections
            ['name' => 'showSections', 'description' => 'Ver Secciones', 'module' => 'Secciones'],
            ['name' => 'createSections', 'description' => 'Crear Secciones', 'module' => 'Secciones'],
            ['name' => 'updateSections', 'description' => 'Editar Secciones', 'module' => 'Secciones'],
            ['name' => 'deleteSections', 'description' => 'Eliminar Secciones', 'module' => 'Secciones'],

            // Blogs
            ['name' => 'showBlogs', 'description' => 'Ver Blogs', 'module' => 'Blogs'],
            ['name' => 'createBlogs', 'description' => 'Crear Blogs', 'module' => 'Blogs'],
            ['name' => 'updateBlogs', 'description' => 'Editar Blogs', 'module' => 'Blogs'],
            ['name' => 'deleteBlogs', 'description' => 'Eliminar Blogs', 'module' => 'Blogs'],

            // Users
            ['name' => 'showUsers', 'description' => 'Ver Usuarios', 'module' => 'Usuarios'],
            ['name' => 'createUsers', 'description' => 'Crear Usuarios', 'module' => 'Usuarios'],
            ['name' => 'updateUsers', 'description' => 'Editar Usuarios', 'module' => 'Usuarios'],
            ['name' => 'deleteUsers', 'description' => 'Eliminar Usuarios', 'module' => 'Usuarios'],
        ];

        Permission::insert($permissions);
    }
}
