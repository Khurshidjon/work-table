<?php

use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['superadmin', 'viloyat', 'tuman'];
        foreach ($roles as $role){
            \Spatie\Permission\Models\Role::create(['name' => $role]);
        }

        $permissions = ['yaratish huquqi', 'qayta ishlash huquqi', 'tozalash huquqi', 'ko\'rish huquqi', 'superadmin', 'ruhsat berish'];
        foreach ($permissions as $permission){
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }
    }
}
