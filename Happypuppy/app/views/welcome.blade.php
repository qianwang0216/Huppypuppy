<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Happy Puppy Master</title>

    <link rel="stylesheet" href="{{ url('/') }}/css/foundation.css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/master_styles.css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/welcome_styles.css" />
    @yield('customcss')

    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <script src="{{ url('/') }}/js/vendor/modernizr.js"></script>
  </head>
  <body>
      <!-- Navigation -->    
      <nav class="top-bar" data-topbar id="headbar">
        <ul class="title-area">
          <li class="name">
            <h1><a href="#" id="bar_name"><img src="{{ url('/') }}/img/master/dog_logo.png" alt="Happy Puppy Logo" /></a></h1>
          </li>
           <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
          <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">
          <!-- Right Nav Section -->
          <ul class="right" id='registration'>
            <li class="active">
                <a href="#" id="rightlog">
                    Log In<img class="registration" src="{{ url('/') }}/img/master/login.png" alt="Login Icon" />
                </a>
            </li>
            <li class="active">
                <a href="#" id="rightsign">
                    Sign In<img class="registration" src="{{ url('/') }}/img/master/signin.png" alt="Sign In" />
                </a>
            </li>
            
          </ul>
        </section>
      </nav>
      
    <!-- menu -->
    <section id="wholeback">
    <ul class="small-block-grid-3 medium-block-grid-5 large-block-grid-9" id="menubar">
        <li><a href = "#"><img src="{{ url('/') }}/img/master/heart.png" alt="Health Tracker" /></a></li>
        <li><a href = "#"><img src="{{ url('/') }}/img/master/friend.png" alt="Find Friends" /></a></li>      
        <li><a href = "#"><img src="{{ url('/') }}/img/master/manage.png" alt="Manage Your Dog" /></a></li>
        <li><a href = "#"><img src="{{ url('/') }}/img/master/gallery.png" alt="Dog Gallery" /></a></li>
        <li><a href = "#"><img src="{{ url('/') }}/img/master/park.png" alt="Find Parks" /></a></li>
        <li><a href = "#"><img src="{{ url('/') }}/img/master/agenda.png" alt="My Puppy Agenda" /></a></li>
        <li><a href = "#"><img src="{{ url('/') }}/img/master/weather.png" alt="Weather Condition" /></a></li>
        <li><a href = "#"><img src="{{ url('/') }}/img/master/blog.png" alt="Blog" /></a></li>
        <li><a href = "#"><img src="{{ url('/') }}/img/master/star.png" alt="Star Dog" /></a></li>
        
    
    </ul>
    <div>
        <img id="flare" class="show-for-medium-up" data-interchange="{{ url('/') }}[img/master/flare_small.png, (small)], {{ url('/') }}[img/master/flare_medium.png, (medium)], {{ url('/') }}[img/master/flare_large.png, (large)]" src="{{ url('/') }}img/master/fifa_large.png" alt="apps description">
        <noscript><img id="flare" data-interchange="{{ url('/') }}[img/master/flare_small.png, (small)], {{ url('/') }}[img/master/flare_medium.png, (medium)], {{ url('/') }}[img/master/flare_large.png, (large)]"  src="{{ url('/') }}img/master/fifa_large.png" alt="apps description"></noscript>
    </div>
        <div id="content">
            @yield('content')
        </div>        
    </section><!-- wholeback -->

    <!-- footer -->
    <footer>           
        <ul class="small-block-grid-3 medium-block-grid-6 large-block-grid-12" id='foot'>
            <li><a href = "#">health tracker</a></li>
            <li><a href = "#">find parks</a></li>
            <li><a href = "#">manage your dog</a></li>
            <li><a href = "#">dog gallery</a></li>
            <li><a href = "#">find friends</a></li>
            <li><a href = "#">my puppy agenda</a></li>
            <li><a href = "#">weather conditions</a></li>
            <li><a href = "#">blogs</a></li>
            <li><a href = "#">star pets</a></li>
            <li><a href = "#"><img class='margin_media' src='{{ url('/') }}/img/master/twitter-icon.png' alt='Twitter Icon' /></a><a href = "#"><img src='{{ url('/') }}/img/master/linked-in-icon.png' alt='Twitter Icon' /></a></li>
            <li><a href = "#"><img class='margin_media' src='{{ url('/') }}/img/master/google-plus-icon.png' alt='Twitter Icon' /></a><a href = "#"><img src='{{ url('/') }}/img/master/rss-icon.png' alt='Twitter Icon' /></a></li>
            <li><a href = "#"><img class='margin_media' src='{{ url('/') }}/img/master/facebook-icon.png' alt='Twitter Icon' /></a><a href = "#"><img src='{{ url('/') }}/img/master/youtube-icon.png' alt='Twitter Icon' /></a></li>
        </ul>
        <p id='copyright'>&copy;Copyright 2014. Happy Puppy. All rights reserved.</p>
    </footer>
    
    <script src="{{ url('/') }}/js/vendor/jquery.js"></script>
    <script src="{{ url('/') }}/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
     @yield('scriptonbottom')
  </body>
</html>
