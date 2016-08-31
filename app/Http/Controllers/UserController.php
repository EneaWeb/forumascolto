<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use \App\Alert as Alert;
use \App\User as User;
use \App\Profile as Profile;
use \App\Proposal as Proposal;
use App\Http\Requests;

class UserController extends Controller
{
	public function lists(){
		$users = User::all();
		return view('backend.users', compact('users'));
	}
}
