<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$postCount = 0;
    	while ($postCount<10)
    	{
	        DB::table('Posts')->insert([
	        	'user_id'=>rand(0,10),
	        	'title'=>str_random(15),
	        	'text'=>str_random(200),
	        ]);

	        $postCount++;

    	}
    }
}
