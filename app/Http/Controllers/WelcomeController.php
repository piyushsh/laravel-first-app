<?php namespace App\Http\Controllers;

use App\Article;

use App\Portfolio;
use App\Providers\ViewComposerServiceProvider;

use App\Testinterface\TestInterface;
use Illuminate\Support\Facades\View;


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

    protected $interface;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(TestInterface $interface)
	{
        //$this->viewComposerServiceProvider = $viewComposerServiceProvider;
		//$this->middleware('guest', except[]);
        $this->interface=$interface;
        $this->interface->setName("Piyush Sharma");
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
        $interface=$this->interface;
		return view('welcome',compact('articles','portfolios','testDependencyClass','interface'));
	}

}

