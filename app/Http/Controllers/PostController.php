<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use \App\Post as Post;
use App\Http\Requests;
use \App\Alert as Alert;
use Image;

class PostController extends Controller
{
	
	public function index()
	{
		$posts = Post::paginate(12);
		return view('blog', compact('posts'));	
	}
	
	public function create()
	{
		$post = new Post;
		$post->title = Input::get('title');
		$post->content = Input::get('content');
		$post->user_id = Auth::user()->id;
		// manage image file
		if (Input::hasFile('picture'))
		{
			$imageFullName = trim($post->id.
									'-'.str_random(4).
									'-'.Input::file('picture')->getClientOriginalName());
			
			Image::make(Input::file('picture'))->resize(838, null, function ($constraint) {
			    $constraint->aspectRatio();
			    $constraint->upsize();
			})->save(base_path().'/public/uploads/posts/'.$imageFullName);
			
			$post->picture = $imageFullName;
		} else {
			$post->picture = 'default.jpg';
		}
		$post->save();
		
		Alert::success('Post creato correttamente');
		return redirect()->back();
	}
	
	public function edit()
	{
		$post = Post::find(Input::get('id'));
		$post->title = Input::get('title');
		$post->content = Input::get('content');
		$post->user_id = Auth::user()->id;
		
		// manage image file
		if (Input::hasFile('picture'))
		{
			$imageFullName = trim($post->id.
									'-'.str_random(4).
									'-'.Input::file('picture')->getClientOriginalName());
			
			Image::make(Input::file('picture'))->resize(838, null, function ($constraint) {
			    $constraint->aspectRatio();
			    $constraint->upsize();
			})->save(base_path().'/public/uploads/posts/'.$imageFullName);
			
			$post->picture = $imageFullName;
		}
		
		$post->save();
		
		Alert::success('Post salvato correttamente');
		return redirect()->back();
	}
	
	public function lists()
	{
		if (!Auth::check() || !Auth::user()->can('manage posts')) {
			Alert::error('non hai i permessi necessari per effettuare questa azione');
			return redirect()->back();
		}
		
		$posts = Post::orderBy('id', 'desc')->get();
		return view('backend.posts', compact('posts'));
	}
	
	public function modal()
	{
		if (!Input::has('id'))
			return 'no id found in request';
		// retrieve data from add_lines jquery call during the step3 order process
		$id = Input::get('id');
		$post = Post::find($id);
		
		return view('backend._modal_edit_post', compact('post'));
	}
	
}
