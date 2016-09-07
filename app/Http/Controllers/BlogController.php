<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use \App\Post as Post;
use \App\User as User;
use App\Http\Requests;

class BlogController extends Controller
{
	public function index()
	{
		$posts = Post::all();
		return view('frontend.blog', compact('posts'));
	}
	
	public function from_id($id)
	{
		$page = Post::find($id);
		if (!$page)
			return redirect('/news');
		return view('page', compact('page'));
	}
}
