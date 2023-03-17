<!DOCTYPE html>
<html>

<head>
    <title>E-commerce</title>
    @include('includes.public.css')
</head>

<body>
<!-- HEADER =============================-->
<header class="item header margin-top-0">
    <div class="wrapper">
        <nav role="navigation" class="navbar navbar-white navbar-embossed navbar-lg navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{URL('public/home')}}" class="navbar-brand brand"> E-commerce </a>
                </div>
                <div id="navbar-collapse-02" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="propClone"><a href="{{URL('public/home')}}">Home</a></li>
                        <li class="propClone"><a href="{{URL('public/store')}}">Stores</a></li>
                        <li class="propClone"><a href="{{URL('public/product')}}">Products</a></li>
                    </ul>
                    <form action="{{URL('public/product/search')}}" method="GET" class="form-inline my-2 my-lg-0" style="text-align: center; margin-top: 20px">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        @yield('header')
    </div>
</header>

@yield('content')

<!-- FOOTER =============================-->
<div class="footer text-center">
    <div class="container">
        <div class="row">
            <p class="footernote">
                Connect with Scorilo
            </p>
            <ul class="social-iconsfooter">
                <li><a href="#"><i class="fa fa-phone"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
            <p>
                &copy; 2017 Your Website Name<br/>
                Scorilo - Free template by <a href="https://www.wowthemes.net/">WowThemesNet</a>
            </p>
        </div>
    </div>
</div>

@include('includes.public.js')

</body>
</html>
