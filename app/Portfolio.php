<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model {

	//
    protected $fillable = [
        'title',
        'url',
        'description',
        'deployed_date',
        'published_at',
        'portfolio_url',
        'image_url'
    ];

    protected $dates = ['deployed_date','published_at'];



    public function scopeRecentPortfolio($query)
    {
        $query->where('published_at','<=', Carbon::now());
    }



}
