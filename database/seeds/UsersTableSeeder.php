<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$counter =0;
    	while($counter<10)
    	{
	        DB::table('users')->insert([
	        	'name'=>str_random(10),
	        	'email'=>str_random(5).'@gmail.com',
	        	'password'=>bcrypt('secret')

	        ]);

	        $counter++;
    	}
    }
}
