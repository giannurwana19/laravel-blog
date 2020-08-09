<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <meta name="description" content="">
  <meta name="author" content="Gian Nurwana">

  {{-- meta untuk facebook --}}
  {{-- ketika kita share sesuatu dari fb, maka fb akan mengambil data dari meta ini --}}
  <meta property="og:title" content="European Travel Destinations">
  <meta property="og:description" content="Offering tour packages for individuals or groups.">
  <meta property="og:image" content="http://euro-travel-example.com/thumbnail.jpg">
  <meta property="og:url" content="http://euro-travel-example.com/index.htm">

  {{-- meta untuk twitter --}}
  <meta name="twitter:title" content="European Travel Destinations ">
  <meta name="twitter:description" content=" Offering tour packages for individuals or groups.">
  <meta name="twitter:image" content=" http://euro-travel-example.com/thumbnail.jpg">
  <meta name="twitter:card" content="summary_large_image">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Callie HTML Template</title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
  <!-- HEADER -->
  <header id="header">
    <!-- NAV -->
    <div id="nav">
      <!-- Top Nav -->
      <div id="nav-top">
        <div class="container">
          <!-- social -->
          <ul class="nav-social">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>
          <!-- /social -->

          @foreach ($data as $item)
          <!-- logo -->
          <div class="nav-logo">
            <a href="index.html" class="logo"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a>
          </div>
          <!-- /logo -->

          <!-- search & aside toggle -->
          <div class="nav-btns">
            <button class="aside-btn"><i class="fa fa-bars"></i></button>
            <button class="search-btn"><i class="fa fa-search"></i></button>
            <div id="nav-search">
              <form action="{{ route('blog.search') }}" method="GET">
                <input class="input" name="search" placeholder="Enter your search...">
              </form>
              <button class="nav-close search-close">
                <span></span>
              </button>
            </div>
          </div>
          <!-- /search & aside toggle -->
        </div>
      </div>
      <!-- /Top Nav -->

      <!-- Main Nav -->
      <div id="nav-bottom">
        <div class="container">
<!-- nav -->
          <ul class="nav-menu">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('blog.list') }}">List Post</a></li>
            <li class="has-dropdown">
              <a href="">Category</a>
              <div class="dropdown">
                <div class="dropdown-body">
                  <ul class="dropdown-list">
                    @foreach ($categories as $category)
                    <li><a href="">{{ $category->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </li>
          </ul>
          <!-- /nav -->
        </div>
      </div>
      <!-- /Main Nav -->

      <!-- Aside Nav -->
      <div id="nav-aside">
        <ul class="nav-aside-menu">
          <li><a href="index.html">Home</a></li>
          <li class="has-dropdown"><a>Categories</a>
            <ul class="dropdown">
              <li><a href="#">Lifestyle</a></li>
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">Travel</a></li>
              <li><a href="#">Health</a></li>
            </ul>
          </li>
          <li><a href="about.html">About Us</a></li>
          <li><a href="contact.html">Contacts</a></li>
          <li><a href="#">Advertise</a></li>
        </ul>
        <button class="nav-close nav-aside-close"><span></span></button>
      </div>
      <!-- /Aside Nav -->
    </div>
    <!-- /NAV -->

    <!-- PAGE HEADER -->
    <div id="post-header" class="page-header">
      <div class="page-header-bg" style="background-image: url({{ asset("storage/posts/$item->gambar") }});"
        data-stellar-background-ratio="0.5">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <div class="post-category">
              <a href="#">{{ $item->category->name }}</a>
            </div>
            <h1>{{ $item->judul }}</h1>
            <ul class="post-meta">
              <li><a href="author.html">{{ $item->user->name }}</a></li>
              <li>{{ $item->created_at }}</li>
              <li><i class="fa fa-comments"></i> 3</li>
              <li><i class="fa fa-eye"></i> 807</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <!-- /PAGE HEADER -->

  </header>
  <!-- /HEADER -->