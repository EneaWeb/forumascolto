<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use Image;
use File;
use \App\Alert as Alert;
use \App\Proposal as Proposal;
use \App\Post as Post;
use \App\User as User;
use \App\Profile as Profile;
use DB;
use \App\Type as Type;
use App\Http\Requests;

class ProposalController extends Controller
{
	
	public function index()
	{
		$title = 'Tutte le proposte';
		$proposals = Proposal::where('status', 'approvata')->orderBy('id', 'desc')->paginate(12);
		return view('proposals', compact('proposals', 'title'));
	}
	
	public function add_like()
	{
		if (!Auth::user())
			return redirect()->back();
		
		$proposal_id = Input::get('proposal_id');
		$user_id = Auth::user()->id;
		$vote = new \App\Vote;
		$vote->user_id = $user_id;
		$vote->proposal_id = $proposal_id;
		$vote->save();
		
		$proposal = Proposal::find($proposal_id);
		$likes = $proposal->likes;
		$proposal->likes = $likes + 1;
		$proposal->save();
		
		return 'ok';
		
	}
	
	public function remove_like()
	{
		if (!Auth::user())
			return redirect()->back();
		
		$proposal_id = Input::get('proposal_id');
		$user_id = Auth::user()->id;
		$vote = \App\Vote::where('user_id', $user_id)->where('proposal_id', $proposal_id)->first();
		$vote->delete();
		
		$proposal = Proposal::find($proposal_id);
		$likes = $proposal->likes;
		$proposal->likes = $likes - 1;
		$proposal->save();
		
		return 'ok';
		
	}
	
	public function search()
	{
		// Gets the query string from our form submission 
		$query = Input::get('search');
		// Returns an array of articles that have the query string located somewhere within 
		// our articles titles. Paginates them so we can break up lots of search results.
		
		$proposals_areas = Proposal::whereHas('type', function ($q) use ($query) {
		    $q->where('name', 'LIKE', '%' . $query . '%');
		})->get();
		
		$proposals_tags = Proposal::whereHas('subtype', function ($q) use ($query) {
		    $q->where('name', 'LIKE', '%' . $query . '%');
		})->get();
		
		$proposals_original = Proposal::where('title', 'LIKE', '%' . $query . '%')
									 ->orWhere('description_short', 'LIKE', '%' . $query . '%')
									 ->orWhere('description_long', 'LIKE', '%' . $query . '%')
									 ->get();
		
		$proposals = $proposals_original->merge($proposals_areas->merge($proposals_tags));
		
		if ($proposals->isEmpty())
			return redirect('/no-results');
		
		$nolink = true;
		
		$title = 'Ricerca : '.Input::get('search');
		
		return view('proposals', compact('proposals', 'title', 'nolink'));
	 }
	
	public function noresults()
	{
		return view('nothing_found');
	}
	
	public function area($id)
	{
		$proposals = Proposal::where('type_id', $id)->where('status', 'approvata')->orderBy('id', 'desc')->get();
		if ($proposals->isEmpty())
			return redirect('/aree');
		$proposals = Proposal::where('type_id', $id)->where('status', 'approvata')->orderBy('id', 'desc')->paginate(12);
		$title = \App\Type::find($id)->name;
		return view('proposals', compact('proposals', 'title'));
	}
	
	public function tag($id)
	{
		$proposals = Proposal::where('subtype_id', $id)->where('status', 'approvata')->orderBy('id', 'desc')->get();
		if ($proposals->isEmpty())
			return redirect('/aree');
		$proposals = Proposal::where('subtype_id', $id)->where('status', 'approvata')->orderBy('id', 'desc')->paginate(12);
		$title = \App\Subtype::find($id)->name;
		return view('proposals', compact('proposals', 'title'));
	}
	
	public function single($id)
	{
		$proposal = Proposal::find($id);
		if (!$proposal)
			return redirect('/progetti');
		
		$title = $proposal->title;
		return view('proposal_single', compact('proposal', 'title'));
	}
	
	public function homepage()
	{
		$best_proposals = Proposal::where('status', 'approvata')->orderBy('likes', 'desc')->take(8)->get();
		$posts = DB::table('posts')->orderBy('created_at', 'desc')->take(2)->get();
		return view('home', compact('best_proposals', 'posts'));
	}
	
	public function lists()
	{
		$proposals = Proposal::all();
		return view('backend.proposals', compact('proposals'));
	}
	
	public function da_vedere()
	{
		$proposals = Proposal::where('status', 'da vedere')->get();
		return view('backend.proposals', compact('proposals'));
	}
	
	public function approvate()
	{
		$proposals = Proposal::where('status', 'approvata')->get();
		return view('backend.proposals', compact('proposals'));
	}
	
	public function non_approvate()
	{
		$proposals = Proposal::where('status', 'non approvata')->get();
		return view('backend.proposals', compact('proposals'));
	}
	
	public function preview($id)
	{
		$proposal = Proposal::find($id);
		return view('frontend.proposal-preview', compact('proposal'));
	}
	
	public function confirm($id)
	{
		if (!Auth::check())
			return redirect('/');
		
		$proposal = Proposal::find($id);
		$proposal->status = 'approvata';
		$proposal->save();
		Alert::success('Status modificato con successo');
		return redirect()->back();
	}
	
	public function modal()
	{
		$proposal = Proposal::find(Input::get('id'));
		return view('backend._modal_show_proposal', compact('proposal'));
	}
	
	public function deactivate($id)
	{
		if (!Auth::check())
			return redirect('/');
		
		$proposal = Proposal::find($id);
		$proposal->status = 'non approvata';
		$proposal->save();
		Alert::success('Status modificato con successo');
		return redirect()->back();
	}
	
	public function upload()
	{
		
		if (Auth::check()) {
			$user = Auth::user();
		} else {
			$user = new \App\User;
			$user->name = Input::get('name'). ' '. Input::get('surname');
			$user->email = Input::get('email');
			$user->password = bcrypt(Input::get('pass1'));
			$user->occupation = Input::get('occupation');
			$user->ip = request()->ip();
			$user->save();
			
			$profile = new \App\Profile;
			$profile->name = Input::get('name');
			$profile->surname = Input::get('surname');
			$profile->gender = Input::get('gender');
			$profile->postcode = Input::get('postcode');
			$profile->save();
		}

		$proposal = new Proposal;
		$proposal->user_id = $user->id;
		$proposal->type_id = Input::get('type');
		$proposal->title = Input::get('title');
		$proposal->subtype_id = Input::get('subtype');
		$proposal->status = 'da vedere';
		$proposal->description_short = Input::get('description_short');
		$proposal->description_long = Input::get('description_long');
		$proposal->likes = 0;
		$proposal->save();
		
		// manage image file
		if (Input::hasFile('picture'))
		{
			$imageFullName = trim($proposal->id.
									'-'.str_random(4).
									'-'.Input::file('picture')->getClientOriginalName());
			
			Image::make(Input::file('picture'))->resize(838, null, function ($constraint) {
			    $constraint->aspectRatio();
			    $constraint->upsize();
			})->save(base_path().'/public/uploads/proposals/'.$imageFullName);
			
			$proposal->picture = $imageFullName;
		} else {
			$proposal->picture = 'default.jpg';
		}
		// save the line
		$proposal->save();
		
		Alert::success('La tua proposta è stata correttamente registrata e verrà pubblicata quanto prima dopo le operazioni di verifica.');
		return redirect()->back();
	}
	
}
