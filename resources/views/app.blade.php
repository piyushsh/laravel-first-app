<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Piyush Sharma</title>

	<link href="{{ asset('/')}}/css/all.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>


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

    <?php
        $random = rand(1,3);
        $class="banner".$random;
    ?>

    <section class="banner_container other_pages {{$class}}">
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
            @include('flash::message')
            @yield('content')
    </section>



	<!-- Scripts -->
	<script src="{{asset('/')}}/js/all.js"></script>

    <script>
        $('#flash-overlay-modal').modal();
        //$('div.alert').not('.alert_important').delay(4000).slideUp(500);
    </script>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
