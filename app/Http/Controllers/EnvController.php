<?php


/**
	EnvController.php

	Controlleur permettant de gerer la partie environnement du site
*/
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\AuthBusiness; 

class EnvController extends Controller
{
	public function signup()
	{
		return view('env/signup');
	}

	public function login( )
	{
		return view('env/login');
	}

	public function members()
	{
		return view('env/members');
	}

	public function doLogin( Request $req )
	{
		$validator = Validator::make($req->all() , [
			'user-pseudo' => 'required',
			'user-password' => 'required|min:6'
		]);

		if( $validator->fails() )
			return redirect()->route('envLoginPage')->withErrors($validator);
		
		$userPseudo = $req->post('user-pseudo');
		$userPassword = $req->post('user-password');

		if( AuthBusiness::connectUser($userPseudo, $userPassword) ){
			return redirect()->route('indexPage');
		}

		return redirect()->route('envLoginPage')->with('id_error' , 1);
	}

	public function doSignup(Request $req)
	{
		$req->validate([
			'user-last-name' => 'required',
			'user-first-name' => 'required',
			'user-email' => 'required',
			'user-tel'=>'required',
			'user-birth-date' => 'required',
			'user-pseudo' => 'required',
			'user-password' => 'required|min:6',
			'user-password-confirm' => 'required|min:6'
		]);

		$userLastName= 		$req->post("user-last-name");
		$userFirstName = 	$req->post("user-first-name");
		$userEmail = 		$req->post("user-email");
		$userTel = 			$req->post("user-tel");
		$userBirthDate = 	$req->post("user-birth-date");
		$userPseudo = 		$req->post("user-pseudo");
		$userPassword = 	$req->post("user-password");
		$userPasswordConf = $req->post("user-password-confirm");
		$now = date('Y-m-d');
		if( $userPassword!==$userPasswordConf ){
			return redirect()->route("envSigup")->with('password_error' , 1);
		}

		if( DB::table('membre')->where('pseudo_mb',$userPseudo) ->exists()){
			return redirect()->route("envSigup")->with('pseudo_exists' , 1);
		}

		DB::table('membre')->insert([
			'nom_mb' => $userLastName,
			'prenom_mb' =>$userFirstName,
			'email_mb' => $userEmail,
			'numero_mb' => $userTel , 
			'date_nais_mb' => $userBirthDate,
			'date_ins_mb' => $now,
			'login_mb' => $userPseudo,
			'pseudo_mb' => $userPseudo,
			'password_mb' => Hash::make($userPassword)
		]);

		return redirect()->route('indexPage');
	}

	public function doUpdateUserPhoto( Request $req )
	{
		$userInfos =  AuthBusiness::getUserInfo();
		$userID = $userInfos->id_mb;

		$path = $req->file('user-photo')->store('public/photos');

		DB::table('membre')->where( 'id_mb' , $userID )->update(['photo_mb' => $path]);

		/* reconnecter l'utilisateur */
		AuthBusiness::reloadUser( );

		return redirect()->route('envMembersPage');
	}
}
