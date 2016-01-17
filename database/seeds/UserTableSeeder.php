<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder{

	public function run(){

		DB::table('users')->delete();
		User::create(array(
			'name'     => 'Chris Sevilleja',
			'email'    => 'jnefer.boy@gmail.com',
			'password' => Hash::make('awesome'),
			)
		);
	}

}