<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Alert;
use Aws\Ses\SesClient as SesClient;

class AlertEmailController extends Controller
{
   

	public function sendEmailAlert()
	{

		return Mail::send(new Alert());


	}




}
