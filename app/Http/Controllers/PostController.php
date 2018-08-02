<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuthBusiness;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
	public function posts()
	{
		$posts = DB::table('sujet')->limit(10)->get();
		
		return view('posts/posts')->with('posts' , $posts);
	}

	public function doPost( Request $req )
	{
		$req->validate([
			'post-title' => 'required',
			'post-img' => 'required',
			'post-content' => 'required'
		]);

		$userID = AuthBusiness::getUserInfo()->id_mb;
		
		$postTitle = $req->post('post-title');
		$postImg = $req->file('post-img')->store('public/posts');
		$postContent = $req->post('post-content');

		DB::table('sujet')->insert([
			'actif_sujet' => '0',
			'img_sujet' => $postImg,
			'titre_sujet' => $postTitle,
			'contenu_sujet' => $postContent,
			'date_par_sujet' => date('Y-m-d'),
			'id_mb' => $userID,
			'id_min' => 1,
			'id_type_sujet' => 1,
			'subt_sujet' => '0',
		]);

		return redirect()->route('postsPage');
	}

}
