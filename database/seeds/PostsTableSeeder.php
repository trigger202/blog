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
	        	'user_id'=>rand(1,10),
	        	'title'=>str_random(15),
	        	'text'=>'Chelsea remain hopeful of landing a deal for Roma striker Edin Dzeko but are now looking at Arsenal’s Olivier Giroud and Tottenham’s Fernando Llorente as alternatives, Goal understands. The Blues have been after Dzeko for much of the winter window, but talks have stalled for now as all three parties have been unable to come to any agreements. Dzeko was seen as likely to be added this January alongside team-mate Emerson Palmieri, but for now the striker remains in Italy despite being keen on a move to'
	        ]);

	        $postCount++;

    	}
    }
}
