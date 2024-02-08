<?php

namespace Database\Seeders;

use App\Models\{Permission, Role, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Admin',
            'Atleta',
            'Financeiro',
        ];

        foreach ($roles as $role) {
            $roleExists = Role::where('name', $role)->first();

            if (!$roleExists) {
                Role::insert([
                    'name' => $role,
                    'guard_name' => 'web'
                ]);
            }
        }

        self::addRoleAndPermissionsToAdmin();
    }


    private static function addRoleAndPermissionsToAdmin(): void
    {
        $permissions = Permission::all();
        $adminRole = Role::where('name', 'Admin')->first();

        $adminRole->syncPermissions($permissions);

        $adminUsers = User::where('id', 1)->get();

        foreach ($adminUsers as $user) {
            $user->assignRole($adminRole);
        }
    }
}
