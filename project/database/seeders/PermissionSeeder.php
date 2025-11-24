<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // --- 1. CREAR PERMISOS ---
        $this->command->info('Creating permissions...');
        $permissions = [
            // Sections
            ['name' => 'showSections', 'description' => 'Ver Secciones', 'module' => 'Secciones'],
            ['name' => 'createSections', 'description' => 'Crear Secciones', 'module' => 'Secciones'],
            ['name' => 'updateSections', 'description' => 'Editar Secciones', 'module' => 'Secciones'],
            ['name' => 'deleteSections', 'description' => 'Eliminar Secciones', 'module' => 'Secciones'],

            // Users
            ['name' => 'showUsers', 'description' => 'Ver Usuarios', 'module' => 'Usuarios'],
            ['name' => 'createUsers', 'description' => 'Crear Usuarios', 'module' => 'Usuarios'],
            ['name' => 'updateUsers', 'description' => 'Editar Usuarios', 'module' => 'Usuarios'],
            ['name' => 'deleteUsers', 'description' => 'Eliminar Usuarios', 'module' => 'Usuarios'],

            // Categories
            ['name' => 'manageCategories', 'description' => 'Gestionar Categorías', 'module' => 'Catálogo'],
            // Providers
            ['name' => 'manageProviders', 'description' => 'Gestionar Proveedores', 'module' => 'Catálogo'],
            // Products
            ['name' => 'manageProducts', 'description' => 'Gestionar Productos', 'module' => 'Catálogo'],
        ];

        // Inserta los permisos, pero evita duplicados si el seeder se corre de nuevo
        foreach ($permissions as $permissionData) {
            Permission::firstOrCreate(['name' => $permissionData['name']], $permissionData);
        }
        $this->command->info('Permissions created successfully.');

        // --- 2. CREAR ROLES ---
        $this->command->info('Creating roles...');
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $writerRole = Role::firstOrCreate(['name' => 'Writer']);
        $this->command->info('Roles created successfully.');

        // --- 3. ASIGNAR PERMISOS A ROLES ---
        $this->command->info('Syncing permissions to roles...');
        // El Admin tiene todos los permisos
        $allPermissions = Permission::pluck('id');
        $adminRole->permissions()->sync($allPermissions);

        // El Writer solo tiene permisos de Blogs
        $writerPermissions = Permission::where('module', 'Blogs')->pluck('id');
        $writerRole->permissions()->sync($writerPermissions);
        $this->command->info('Permissions synced to roles successfully.');

        // --- 4. CREAR UN USUARIO ADMIN ---
        $this->command->info('Creating admin user...');
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'], // Busca por email para evitar duplicados
            [
                'name' => 'Admin User',
                'password' => bcrypt('password') // ¡Usa una contraseña segura en producción!
            ]
        );

        // --- 5. ASIGNAR ROL AL USUARIO ADMIN ---
        $adminUser->roles()->sync([$adminRole->id]);
        $this->command->info('Admin user created and assigned Admin role.');
    }
}
