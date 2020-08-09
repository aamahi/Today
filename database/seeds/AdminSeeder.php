<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Abdullah Mahi',
            'email' => 'hello@abdullahmahi.com',
            'password' => Hash::make('mahi1234'),
            'phone' => '01751989173',
        ]);
    }
}
