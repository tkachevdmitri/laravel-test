<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contact()
	{
		return view('pages.contact');
	}
	
	public function about()
	{
		$name = 'Dima Tkachev';
		
		return view('pages.about');
	}
}
