<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Page as Page;
use App\Http\Requests;

class PageController extends Controller
{
	public function privacy()
	{
		$page = Page::find('1');
		return view('page', compact('page'));
	}
	
	public function regolamento()
	{
		$page = Page::find('2');
		return view('page', compact('page'));
	}
}
