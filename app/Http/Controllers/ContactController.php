<?php namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ContactRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return view('contact.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ContactRequest $request)
	{
		//
        $contact = new Contact($request->all());
        $contact->contacted_at = Carbon::now();

        $contact->save();

        //Need to add code for sending out an email to Piyush

        return redirect('contact/thank-you');
	}


    /**
     *
     * Saying thank you to the user for contacting Piyush
     */
    public function thankYou()
    {
        return view('contact.thankyou');
    }

	

}
