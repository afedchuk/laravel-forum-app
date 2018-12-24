<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DefaultAdmins extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'email'   => 'admin@example.com',
                'password' => Hash::make('admin'),
            ],
        ]);
    }
}
