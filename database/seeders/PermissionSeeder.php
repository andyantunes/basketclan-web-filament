<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['user_read', 'Visualizar usuários', 'Usuários'],
            ['user_create', 'Criar usuários', 'Usuários'],
            ['user_update', 'Atualizar usuários', 'Usuários'],
            ['user_delete', 'Deletar usuários', 'Usuários'],

            ['finance_read', 'Visualizar finanças', 'Finanças'],
            ['finance_create', 'Criar finanças', 'Finanças'],
            ['finance_update', 'Atualizar finanças', 'Finanças'],
            ['finance_delete', 'Deletar finanças', 'Finanças'],
        ];

        foreach ($permissions as $permission) {
            $permissionExists = Permission::where('name', $permission[0])->first();

            if (!$permissionExists) {
                Permission::insert([
                    'name' => $permission[0],
                    'guard_name' => 'web'
                ]);
            }
        }

        $this->call(RoleSeeder::class);
    }
}
