<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller {


    public function __construct(){
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

        Portfolio::create($request->all());


        return redirect('portfolio');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Portfolio $portfolio)
	{
		//
        //$portfolio = Portfolio::findOrFail($id);

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
	public function destroy($id)
	{
		//
	}

}
