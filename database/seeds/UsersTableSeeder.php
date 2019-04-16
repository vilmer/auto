<?php

use Illuminate\Database\Seeder;
use App\User;
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
    	 User::create([
            'name' => 'Good service',
            'email' => 'info@goodservice.com',
            'password' => Hash::make('admin-2019'),
            'perfil'=>'gerente'
        ]);
        
    }
}
