<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	//
    protected $fillable=[
        'title',
        'body',
        'published_at',
        'image_url'
    ];

    protected $dates = ['published_at'];


    /**
     * @param $date
     */
    public function setPublicationAtAttribute($date)
    {
        $this->attributes['published_at']=Carbon::parse($date);
    }


    /**
     * Get the published_at attribute
     *
     * @param $date
     * @return Carbon
     */
    public function getPublishedAtAttribute($date)
    {
        return new Carbon($date);
    }


    //Setting scope for the Article convention is "scopeNameOfScope"
    /**
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at' , "<=", Carbon::now());
    }

    public function scopeUnPublished($query)
    {
        $query->where('published_at' , ">", Carbon::now());
    }

    public function scopeRecentBlogs($query)
    {
        $query->where('published_at','<=', Carbon::now());
    }


    /**
     * An article  is owned by a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Get the tags associated with the given article
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Get a list of tag ids associated with this article
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }


    /**
     * Setting the eloquent relationship between Article and comments. Articles can have many comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

}
