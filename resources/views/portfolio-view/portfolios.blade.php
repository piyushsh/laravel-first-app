@extends('app')

@section('content')

    <div class="container">

        <?php
            $count=0;
        ?>
        @foreach($portfolios as $portfolio)


            @if($count==3)
                <div clas="row">
            @endif
                <div class="col-xs-12 col-lg-4">
                    <div class="">
                        <img src="#" class="img-responsive" />
                    </div>
                    <h2><a href="{{url('portfolio', $portfolio->id)}}">{{$portfolio["title"]}}</a></h2>
                    <p>{{substr($portfolio->description,0,50) . " ..."}}</p>
                </div>
            @if($count==3)
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