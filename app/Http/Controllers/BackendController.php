<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use \App\Alert as Alert;

class BackendController extends Controller
{
	public function index()
	{
		if ( !( Auth::check() && Auth::user()->can('access backend') ) ) {
			Alert::error('Non hai i permessi necessari per eseguire questa azione');
			return redirect()->back();
		}
		
		return view('dashboard');
	}
	
}
