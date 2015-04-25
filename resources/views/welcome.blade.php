<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Piyush Sharma</title>

    <link href="{{ asset('/')}}/css/all.css" rel="stylesheet">


    <!-- Fonts -->
    <!--link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<header>
    <div class="container">
        @include('partials.nav')
    </div>
</header>

<section class="banner_container other_pages">
    <!--div class="container">
        <div class="row text-right">
            <div class="col-xs-12 col-lg-6 col-lg-offset-6">
                <h1>Piyush Sharma</h1>
                <h3>Software Developer</h3>
            </div>
        </div>

    </div-->
</section>

<section class="main_body_container">
    <div class="container">
        <div class="col-xs-12 col-lg-8">
            <h1>Hello</h1>
            <p>My name is <strong>Piyush Sharma</strong> and I welcome you to my website. I'm a developer living in Cork, Ireland. I've work experience in various domain including: self employment, entrepreneurial tech start-ups, and multinational corporations.
            </p>
            <p>After completing my graduation I joined a IT company as a Junior developer. Where I worked over web applications, websites and survey programming. After a year I joined another IT organisation. I learned lot of new technologies, worked over front end development, php applications and survey programming.
                As my supervisors mentioned that I was very dedicated, maintained quality work and posses leadership qualities, which I believe was the reason for my fast paced career growth in the company.
            </p>
            <p>Now, I am pursuing Masters' degree in Computer Science from UCC, Cork, Ireland. I am interested in pursuing a career either in software development or web development.
            </p>

            <p>I created this website to showcase some of my work that I pursued till now. I've also got a small portfolio to showcase some of my work. I hope this is helpful for potential employers or clients to get a better picture of who I am and what I can do. If you're a potential employer, you probably already have my faxable, photocopy-able, single-page black on white resume. This site will simply expand on that to include more descriptive information and samples of my work.
            </p>
            <p>You can contact me through the website or if you like you can add me in your social network.</p>

        </div>

        <div class="col-xs-12 col-lg-3 col-lg-offset-1">
            @if($articles->count() > 0)
            <h1>Blogs</h1>
            <div class="row blog_articles">
                @foreach($articles as $article)
                    <div class="col-xs-12 article">
                        <div class="blog_image_background"><img src="{{asset($article->image_url)}}"></div>
                        <div class="home_page">
                            <h3><a href="{{url('/articles',$article->id)}}">{{$article->title}}</a></h3>
                            <p>{{substr($article->body,0,50)." ..."}} <a href="{{url('/articles',$article->id)}}">Read More</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

            @if($portfolios->count() > 0)

            <h1>Recent Work</h1>
            <div class="row portfolio_container">
                @foreach($portfolios as $portfolio)
                    <div class="col-xs-12 portfolio">
                        <div class="profile_image_background"><img src="{{asset($portfolio->image_url)}}"></div>
                        <div class="home_page">
                            <h3><a href="{{url('/portfolio',$portfolio->id)}}">{{$portfolio->title}}</a></h3>
                            <p>Published : {{\Carbon\Carbon::parse($portfolio->published_at)->format('d-m-Y')}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</section>

<footer>
    @include('footer')
</footer>

<!-- Scripts -->
<script src="{{asset('/')}}/js/all.js"></script>
</body>
</html>
