<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $setting->website_name ?? 'Default Title' }}</title>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/main.css')}}" media="screen" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style-portfolio.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/picto-foundry-food.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery-ui.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/frontend/images/' . $setting->favicon) }}" type="image/x-icon">
    </head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="{{ asset('assets/frontend/images/' . $setting->logo) }}" class="header_logo" >
                    <a class="navbar-brand" href="#">{{ $setting->website_name}}</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav main-nav  clear navbar-right ">
                        <li><a class="navactive color_animation" href="#top">WELCOME</a></li>
                        <li><a class="color_animation" href="#story">ABOUT</a></li>
                        <li><a class="color_animation" href="#pricing">PRICING</a></li>
                        <li><a class="color_animation" href="#beer">BEER</a></li>
                        <li><a class="color_animation" href="#bread">BREAD</a></li>
                        <li><a class="color_animation" href="#featured">FEATURED</a></li>
                        <li><a class="color_animation" href="#reservation">RESERVATION</a></li>
                        <li><a class="color_animation" href="#contact">CONTACT</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div id="top" class="starter_container bg">
        <div class="follow_container">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="top-title"> {{ $setting->website_name}}</h2>
                <h2 class="white second-title">" {{$setting->slogan}} "</h2>
                <hr>
            </div>
        </div>
    </div>

    <!-- ============ About Us ============= -->

    <section id="story" class="description_content">
        <div class="text-content container">
            <div class="col-md-6">
                <h1>About us</h1>
                <div class="fa fa-cutlery fa-2x"></div>
                <p class="desc-text">{{$setting->about_website}}</p>
            </div>
            <div class="col-md-6">
                <div class="img-section">
                    <img src="{{asset('assets/frontend/images/kabob.jpg')}}" width="250" height="220">
                    <img src="{{asset('assets/frontend/images/limes.jpg')}}" width="250" height="220">
                    <div class="{{asset('assets/frontend/img-section-space')}}"></div>
                    <img src="{{asset('assets/frontend/images/radish.jpg')}}" width="250" height="220">
                    <img src="{{asset('assets/frontend/images/corn.jpg')}}" width="250" height="220">
                </div>
            </div>
        </div>
    </section>


    <!-- ============ Pricing  ============= -->


    <section id="pricing" class="description_content">
        <div class="pricing background_content">
            <h1><span>Affordable</span> pricing</h1>
        </div>
        <div class="text-content container">
            <div class="container">
                <div class="row">
                    <div id="w">
                        <!-- Filter List -->
                        <ul id="filter-list" class="clearfix">
                            <li class="filter" data-filter="all">All</li>
                            @foreach($categories as $category)
                            <li class="filter" data-filter="{{ $category->name }}">{{ $category->name }}</li>
                            @endforeach
                        </ul><!-- @end #filter-list -->

                        <!-- Portfolio Items -->
                        <ul id="portfolio">
                            @foreach($foods as $food)
                            <li class="item {{ $food->category->name }}">
                                <img src="{{ asset('assets/images/FoodItems/' . $food->img) }}" alt="{{ $food->name }}">
                                <h2 class="white">${{ $food->price }}</h2>
                            </li>
                            @endforeach
                        </ul><!-- @end #portfolio -->
                    </div><!-- @end #w -->
                </div>
            </div>
        </div>
    </section>


    <!-- ============ Our Beer  ============= -->


    <section id="beer" class="description_content">
        <div class="beer background_content">
            <h1>Great <span>Place</span> to enjoy</h1>
        </div>
        <div class="text-content container">
            <div class="col-md-5">
                <div class="img-section">
                    <img src="{{asset('assets/frontend/images/beer_spec.jpg')}}" width="100%">
                </div>
            </div>
            <br>
            <div class="col-md-6 col-md-offset-1">
                <h1>OUR BEER</h1>
                <div class="icon-beer fa-2x"></div>
                <p class="desc-text">{{$setting->about_beer}}</p>
            </div>
        </div>
    </section>


    <!-- ============ Our Bread  ============= -->


    <section id="bread" class=" description_content">
        <div class="bread background_content">
            <h1>Our Breakfast <span>Menu</span></h1>
        </div>
        <div class="text-content container">
            <div class="col-md-6">
                <h1>OUR BREAD</h1>
                <div class="icon-bread fa-2x"></div>
                <p class="desc-text">{{$setting->about_bread}}</p>
            </div>
            <div class="col-md-6">
                <img src="{{asset('assets/frontend/images/bread1.jpg')}}" width="260" alt="Bread">
                <img src="{{asset('assets/frontend/images/bread.jpg')}}" width="260" alt="Bread">
            </div>
        </div>
    </section>



    <!-- ============ Featured Dish  ============= -->

    <section id="featured" class="description_content">
        <div class="featured background_content">
            <h1>Our Featured Dishes <span>Menu</span></h1>
        </div>
        <div class="text-content container">
            <div class="col-md-6">
                <h1>Have a look to our dishes!</h1>
                <div class="icon-hotdog fa-2x"></div>
                <p class="desc-text">{{$setting->food_description}}</p>
            </div>
            <div class="col-md-6">
                <ul class="image_box_story2">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{asset('assets/frontend/images/slider1.jpg')}}" alt="...">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="item">
                                <img src="{{asset('assets/frontend/images/slider2.jpg')}}" alt="...">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="item">
                                <img src="{{asset('assets/frontend/images/slider3.JPG')}}" alt="...">
                                <div class="carousel-caption">

                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </section>

    <!-- ============ Reservation  ============= -->

    <section id="reservation" class="description_content">
        <div class="featured background_content">
            <h1>Reserve a Table!</h1>
        </div>
        <div class="text-content container">
            <div class="inner contact">
                <!-- Form Area -->
                <div class="contact-form">
                    <!-- Form -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                        @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                        @endif
                                        <form id="contact-us" method="post" action="{{ route('frontend.reserve') }}">
                                            @csrf
                                            <!-- Name -->
                                            <input type="text" name="fname" id="first_name" required="required" class="form" placeholder="First Name" />
                                            <input type="text" name="lname" id="last_name" required="required" class="form" placeholder="Last Name" />
                                            <input type="text" name="state" id="state" required="required" class="form" placeholder="State" />
                                            <input type="datetime-local" name="reservation_date_and_time" id="reservation_date_and_time" required="required" class="form" placeholder="Reservation Date and Time" />
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                        <!-- Name -->
                                        <input type="text" name="phone" id="phone" required="required" class="form" placeholder="Phone" />
                                        <input type="text" name="guest_number" id="guest" required="required" class="form" placeholder="Guest Number" />
                                        <input type="email" name="email" id="email" required="required" class="form" placeholder="Email" />
                                        <input type="text" name="subject" id="subject" required="required" class="form" placeholder="Subject" />
                                    </div>

                                    <div class="col-xs-6 ">
                                        <!-- Send Button -->
                                        <button type="submit" id="submit" name="submit" class="text-center form-btn form-btn">Reserve</button>
                                    </div>
                                    </form>

                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <!-- Message -->
                                <div class="right-text">
                                    <h2>Hours</h2>
                                    <hr>
                                    @foreach($openingHours as $day => $hours)
                                    <p>{{ $day }}:</p>
                                    @foreach($hours as $hour)
                                    <p>{{ \Carbon\Carbon::parse($hour->opening_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($hour->closing_time)->format('h:i A') }}</p>
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Clear -->
                    <div class="clear"></div>
                    </form>
                </div><!-- End Contact Form Area -->
            </div><!-- End Inner -->
        </div>
    </section>

    <!-- ============ Social Section  ============= -->

    <section class="social_connect">
        <div class="text-content container">
            <div class="col-md-6">
                <span class="social_heading">FOLLOW</span>
                <ul class="social_icons">
                    <li><a class="icon-twitter color_animation" href="{{$setting->twitter_link}}" target="_blank"></a></li>
                    <li><a class="icon-github color_animation" href="{{$setting->github_link}}" target="_blank"> </a></li>
                    <li><a class="icon-linkedin color_animation" href="{{$setting->linkedin_link}}" target="_blank"> </a></li>
                    <li><a class="icon-mail color_animation" href="{{$setting->gmail_link}}" target="_blank"> </a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <span class="social_heading">OR DIAL</span>
                <span class="social_info"><a class="color_animation" href="tel:883-335-6524">{{$setting->phone_no}}</a></span>
            </div>
        </div>
    </section>

    <!-- ============ Contact Section  ============= -->

    <section id="contact">
        <div class="map">
        {!! $setting->google_map_link !!} </div>

    <!-- ============ Footer Section  ============= -->

    <footer class="sub_footer">
        <div class="container">
            <div class="col-md-4">
                <p class="sub-footer-text text-center">&copy; Restaurant 2014, Theme by <a href="https://themewagon.com/">ThemeWagon</a></p>
            </div>
            <div class="col-md-4">
                <p class="sub-footer-text text-center">Back to <a href="#top">TOP</a></p>
            </div>
            <div class="col-md-4">
                <p class="sub-footer-text text-center">Built With Care By <a href="#" target="_blank">Us</a></p>
            </div>
        </div>
    </footer>


    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery-1.10.2.min.js')}}"> </script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery-1.10.2.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.mixitup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/main.js')}}"></script>

    <script>
        // Define a global variable to hold the scroll-to section ID
        window.scrollToSection = "{{ session('scroll_to') }}";
    </script>

    <!-- Scroll to section script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.scrollToSection) {
                const element = document.getElementById(window.scrollToSection);
                if (element) {
                    element.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    </script>

</body>

</html>