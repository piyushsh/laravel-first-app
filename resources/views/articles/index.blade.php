@extends('app');
@section('content')

<div class="container blog_articles">
    <h1>Blogs</h1>


        <?php $count=0;?>
        @foreach($articles as $article)
            @if($count % 4 == 0)
                <div class="row">
            @endif
                <div class="col-xs-12 col-lg-3 article">
                    <div>
                        <img src="{{asset($article->image_url)}}" class="img-responsive img-thumbnail">
                        <h2><!--a href="{{ action('ArticlesController@show', [$article->id]) }}">{{$article->title}}</a-->
                            <a href="{{url('/articles',$article->id)}}">{{$article->title}}</a></h2>
                        <p>{{$article->body}}</p>
                    </div>
                </div>
            @if($count % 4 == 3)
                </div>
            @endif
                <?php $count++;?>
        @endforeach
    </div>
</div>

@stop