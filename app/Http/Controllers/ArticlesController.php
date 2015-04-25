<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ArticlesController extends Controller
{

    protected $article_image_path;


    public function __construct()
    {
        $this->article_image_path = "images/article/";
        $this->middleware('auth', ['only' => ['create', 'edit','destroy']]);
    }

    //
    public function index()
    {

        $articles = Article::latest('published_at')->published()->get();

        $article_image_path = $this->article_image_path;
        return view('articles.index', compact('articles', 'article_image_path'));
    }

    public function show(Article $article)
    {
        //$article = Article::findOrFail($id);
        //dd($article);
        $article_image_path = $this->article_image_path;
        $article->comments();
        return view('articles.show', compact('article', 'article_image_path'));
    }


    public function create()
    {
        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);
        //$article = Auth::user()->articles()->create($request->all());
        //Article::create($request->all());

//        \Session::flash('flash_message','Your article has been created');
//        session()->flash('flash_message_important',true);

        //$article->tags()->attach($request->input('tag_list'));

        flash()->overlay('Your article is successfuly create', 'Good Job');
        return redirect('articles');
    }

    public function edit(Article $article)
    {
        //$article = Article::findOrFail($id);
        $tags = Tag::lists('name', 'id');

        return view("articles.edit", compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        //$article = Article::findOrFail($id);

        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

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
        $image_url = $this->saveArticleImage($request);
        $request["image_url"] = $image_url;

        if ($image_url != false) {
            $article = Auth::user()->articles()->create($request->all());

            $this->syncTags($article, $request->input('tag_list'));

            return $article;
        }
        return false;

    }


    /**
     * Saving image of the article in a folder
     *
     * @param $url
     */
    public function saveArticleImage(Request $request)
    {
        $article_id = Article::max("id");
        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $extension = $file->guessClientExtension();
            $filename = Auth::user()->id . "_article_" . ($article_id + 1) . "." . $extension;
            $file->move($this->article_image_path, $filename);
            return $this->article_image_path.$filename;
        }
        return false;
    }


    public function destroy(Article $article)
    {
        if($article->delete())
        {
            flash('Article Deleted.');
            $articles=Article::all();
            $article_image_path = $this->article_image_path;
            return redirect('articles');
        }
        return redirect('articles/'.$article->id);
    }

}
