<?php namespace App\Http\Controllers;

use App\Article;
use App\Portfolio;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest', except[]);
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $articles = Article::latest('published_at')->recentBlogs()->limit(3)->get();
        $portfolios = Portfolio::latest('published_at')->recentPortfolio()->limit(2)->get();
		return view('welcome',compact('articles','portfolios'));
	}

}
