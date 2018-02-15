<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Alert;


class AlertEmailController extends Controller
{
   

	public function sendEmailAlert()
	{

		return Mail::to('farehh@gmail.com')->send(new Alert());

	}

}
