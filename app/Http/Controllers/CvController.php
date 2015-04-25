<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CvController extends Controller {

    private $pathToCV;
    private $fileName;

    public function __construct()
    {
        $this->pathToCV="/cv/";
        $this->fileName='piyush_cv.doc';
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return response()->download($this->pathToCV.$this->fileName);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function upload()
	{
        return view('cv.upload');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        if($request->hasFile('cv'))
        {
            $file = $request->file('cv');
            $file->move($this->pathToCV,$this->fileName);
            return view('cv.thanks');
        }
        flash()->overlay('File was not selected','');
        return view('cv.upload');

	}

}
