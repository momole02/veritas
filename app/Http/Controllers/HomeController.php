<?php

/*
	HomeController.php 
	-- 
	Controleur permettant de gérer les tout ce qui est lié à l'accueil
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
    	return view('home');
    }
}
