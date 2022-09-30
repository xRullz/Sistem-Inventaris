<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'gudang',
            'email' => 'gudang@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'gudang',
        ]);
    }
}