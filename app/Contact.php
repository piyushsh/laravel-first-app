<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	//

    protected $fillable = [
        'name',
        'contact_no',
        'email',
        'query'
    ];

    protected $dates = ['contacted_at'];

}
