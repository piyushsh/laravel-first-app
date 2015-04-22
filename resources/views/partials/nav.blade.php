<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <a href="{{url('/')}}" class="navbar-brand">Piyush Sharma</a>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-left">
                <li>{!! link_to_action('ArticlesController@show',$latest->title, [$latest->id]) !!}</li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li><a href="{{url('/articles')}}">Blogs</a></li>
                <li><a href="{{url('/portfolio')}}">Portfolio</a></li>
                <li><a href="{{url('/cv')}}">CV/Resume</a></li>
                <li><a href="{{url('/contact')}}">Contact</a></li>
                @if (!Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>