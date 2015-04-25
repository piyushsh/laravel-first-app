<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

	//

    protected $fillable = [
        'name','email','comment','article_id'
    ];


    /**
     * Comment can be related to only one article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articles()
    {
        return $this->belongsTo('App\Article');
    }



}
