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
	
	public function informativa()
	{
		$page = Page::find('3');
		return view('page', compact('page'));
	}
	
	public function liberatoria()
	{
		$page = Page::find('4');
		return view('page', compact('page'));
	}
}
