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
            <h1>Namaste</h1>
            <p>My name is <strong>Piyush Sharma</strong> and I welcome you to my website. Ok I got your attention with the title, right? Now let me explain. My name is Ben. I'm a life long techie living in Langley, BC. I've had my fare share of diversity when it comes to work experience, including: self employment, entrepreneurial tech start-ups, and multinational corporations
            </p>
            <p>When my last position came to an ammicable end, I did what all reasonable people would do. I cleaned up my resume and formatted it for a single sheet of 8-1/2x11 paper. Then I matched it with a well written cover letter and sent it to every job posting I could find in my field of expertise.
            </p>
            <p>I learned very quickly that this doesn't work for techies like me. Why? Because technical jobs have a vast array of acronyms, technologies and 3rd party tools. To list my skills and experience within each area on a single page is difficult at best. To make matters worse, I found that many employers had administrative staff filtering resumes by keywords. Although I understand the need to cut-down the stack before they hit the manager's desk, the administrative staff often don't know what all these silly acronyms and industry jargon mean. Their boss said find someone with '.net' and my resume said 'C#' or their boss said 'JavaScript' and I put 'jQuery/AJAX' on my resume. If you knew the industry you'd know these examples are like peas in a pod - they really mean the same stuff.
            </p>
            <p>So... I created this website to showcase my traditional resume in an "enhanced mode". I've also got a small portfolio to showcase some of my work. I hope this is helpful for potential employers or clients to get a better picture of who I am and what I can do. If you're a potential employer, you probably already have my faxable, photocopy-able, single-page black on white resume. This site will simply expand on that to include more descriptive information and samples of my work.
            </p>

        </div>

        <div class="col-xs-12 col-lg-3 col-lg-offset-1">
            <h1>Blogs</h1>
            <div class="row blog_articles">
                @foreach($articles as $article)
                    <div class="col-xs-12 article">
                        <div>
                            <h3><a href="{{url('/articles',$article->id)}}">{{$article->title}}</a></h3>
                            <p>{{substr($article->body,0,50)." ..."}} <a href="{{url('/articles',$article->id)}}">Read More</a></p>
                        </div>
                    </div>
                @endforeach
            </div>

            <h1>Recent Work</h1>
            <div class="row portfolio_container">
                @foreach($portfolios as $portfolio)
                    <div class="col-xs-12 portfolio">
                        <div>
                            <div class="portofolio_image_container">
                                <img src="#" class="img-thumbnail img-responsive">
                            </div>
                            <h3><a href="{{url('/portfolio',$portfolio->id)}}">{{$portfolio->title}}</a></h3>
                            <p>Published : {{\Carbon\Carbon::parse($portfolio->published_at)->format('d-m-Y')}}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="col-xs-12 col-lg-12 text-center">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><img src="{{asset('/images/linked-in-icon.png') }}"/></a></li>
                <li><a href="#"><img src="{{asset('/images/fb-icon.png') }}"/></a></li>
                <li><a href="#"><img src="{{asset('/images/twitter-icon.png') }}"/></a></li>
            </ul>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{asset('/')}}/js/all.js"></script>
</body>
</html>
