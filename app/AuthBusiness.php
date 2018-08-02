<?php 

namespace App;

use Illuminate\Support\Facades\DB;

class AuthBusiness
{
	public static function connectUser( $login,$password )
	{
		if( DB::table('membre')->where('login_mb' , $login)->exists() ){
			$userInfo = DB::table('membre')->where('login_mb' , $login)->first();
			session()->put( 'user-info', $userInfo );
			return true;
		}
		return false;
	}

	public static function getUserInfo( )
	{
		if( AuthBusiness::isUserConnected() ){
			return session()->get('user-info');
		}
		return null ; 
	}

	public static function isUserConnected()
	{
		return session()->has('user-info');
	}

	public static function reloadUser()
	{
		if( AuthBusiness::isUserConnected() ){
			$id = AuthBusiness::getUserInfo()->id_mb;
			session()->put( 'user-info' , DB::table('membre')->where('id_mb', $id)->first() );
		}
	}
}