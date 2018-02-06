<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    

	public function post()
	{
		return $this->BelongsTo(Post::class);
	}

	public function user()
	{
		return $this->BelongsTo(Úser::class);
	}

}
