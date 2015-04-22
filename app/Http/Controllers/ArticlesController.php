<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['only'=>['create','edit']]);
    }
	//
    public function index(){

        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index',compact('articles'));
    }

    public function show(Article $article)
    {
        //$article = Article::findOrFail($id);

        //dd($article);

        return view('articles.show', compact('article'));
    }



    public function create()
    {
        $tags = Tag::lists('name','id');
        return view('articles.create',compact('tags'));
    }

    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);
        //$article = Auth::user()->articles()->create($request->all());
        //Article::create($request->all());

//        \Session::flash('flash_message','Your article has been created');
//        session()->flash('flash_message_important',true);

        //$article->tags()->attach($request->input('tag_list'));

        flash()->overlay('Your article is successfuly create','Good Job');
        return redirect('articles');
    }

    public function edit(Article $article)
    {
        //$article = Article::findOrFail($id);
        $tags = Tag::lists('name','id');

        return view("articles.edit", compact('article','tags'));
    }

    public function update(Article $article,ArticleRequest $request)
    {
        //$article = Article::findOrFail($id);

        $article->update($request->all());

        $this->syncTags($article,$request->input('tag_list'));

//        $article->tags()->sync($request->input('tag_list'));
        return redirect('articles');


    }


    /**
     * Synching tags of the articles
     *
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }


    /**
     * Creating new article and synching tags of the article
     *
     * @param ArticleRequest $request
     * @return mixed
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

}
