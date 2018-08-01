<?php


/**
	EnvController.php

	Controlleur permettant de gerer la partie environnement du site
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnvController extends Controller
{
	public function signup()
	{
		return view('env/signup');
	}
}
