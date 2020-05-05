<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Xurshid Ergashev',
            'email' => 'admin@xergashev.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secretpassword'),
            'phone' => '+998990005795',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
