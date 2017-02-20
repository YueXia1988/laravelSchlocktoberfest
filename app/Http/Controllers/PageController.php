<?php
namespace App\Http\Controllers;


class PageController extends Controller
{
	public function getIndex(){
		$title = "Schlocktoberfest";
		$caption ="The best worst film festival";
		return view('welcome')->withTitle($title)->withCaption($caption);
	}
	public function getAbout(){
		$data = [];
		$data['username']="yuexia";
		$data['email'] = "yuexia19@gmail.com";
		return view('about') -> withData($data);
	}

	public function getMovies(){
	
		return view('movies');
	}

	public function getContact(){
		
		return view('contact');
	}
}

