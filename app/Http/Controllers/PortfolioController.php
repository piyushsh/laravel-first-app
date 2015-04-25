<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PortfolioController extends Controller {

    protected $portfolio_image_path;

    public function __construct(){
        $this->portfolio_image_path = "images/portfolio/";
        $this->middleware('auth',['only'=> ['create','edit']]);
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $portfolios = Portfolio::all(); //Need to put all portfolios in the variable

        if (is_null($portfolios))
        {
            abort('404');
        }

		return view('portfolio-view.portfolios', compact('portfolios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
//        if(Session::has('image_not_uploaded'))
//        {
//            flash()->overlay(Session::get('image_not_uploaded'));
//        }

        //dd(session()->all());

        return view('portfolio-view.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $this->validate($request,['title'=>'required|min:5', 'description'=>'required|min:10', 'url'=> 'url','deployed_date'=>'date']);
        $url=$this->savePortfolioImage($request);
        if($url)
        {
            $request["image_url"]=$url;
            Portfolio::create($request->all());
            return redirect('portfolio');
        }

        flash()->overlay('image_not_uploaded','Try again to upload the image');
        return redirect('portfolio/create');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Portfolio $portfolio)
    {
        //dd($portfolio);
        return view("portfolio-view.show", compact('portfolio'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Portfolio $portfolio)
	{
		//
        //$portfolio=Portfolio::findOrFail($id);

        return view('portfolio-view.edit', compact('portfolio'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Portfolio $portfolio, Request $request)
	{
		$this->validate($request,['title'=>'required|min:5', 'description'=>'required|min:10', 'url'=> 'url','deployed_date'=>'date']);

        //$portfolio = Portfolio::findOrFail($id);

        $portfolio->update($request->all());

        return redirect('portfolio');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($article)
	{
		//
        $article->delete();
        flash()->overlay("Portfolio Deleted","Your selected portfolio is deleted successfully.");
        return redirect('portfolio');
	}


    /**
     * Saving image of the portfolio in a folder
     *
     * @param $url
     */
    public function savePortfolioImage(Request $request)
    {
        $portfolio_id = Portfolio::max("id");
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->guessClientExtension();
            $filename = Auth::user()->id . "_portfolio_" . ($portfolio_id + 1) . "." . $extension;
            $file->move($this->portfolio_image_path, $filename);
            return $this->portfolio_image_path.$filename;
        }
        return false;
    }

}
