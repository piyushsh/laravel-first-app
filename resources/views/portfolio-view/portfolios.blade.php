@extends('app')

@section('content')

    <div class="container">

        <h1>Portfolio</h1>
        <?php
            $count=0;
        ?>
        @foreach($portfolios as $portfolio)


            @if($count % 4 == 0)
                <div class="row portfolio_container">
            @endif
                <div class="col-xs-12 col-lg-3 portfolio">
                    <div>
                        <div>
                            <img src="{{asset($portfolio->image_url)}}" class="img-responsive" />
                        </div>
                        <h2><a href="{{url('portfolio', $portfolio->id)}}">{{$portfolio["title"]}}</a></h2>
                        <p>{{substr($portfolio->description,0,50) . " ..."}}</p>
                    </div>
                </div>
            @if($count % 4 == 3)
                </div>
            @endif
            <?php
                $count++;
            ?>

        @endforeach
        @if($count==0)
            <h1>No Portfolio to present for now. Please visit later</h1>
            @endif
    </div>

@stop