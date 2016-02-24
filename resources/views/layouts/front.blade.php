<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BDR Computer Pati - Termurah</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">    

    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/shop-homepage.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<header class="headerman"></header>
    <!-- Navigation -->
    <!-- navbar-fixed-top -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL('/') }}">BDR Computer Pati</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">                    
                    <li>
                        <a href="{{ URL('/product') }}">Product</a>
                    </li>
                    <li>
                        <a href="{{ URL('/konfirmasi') }}">Konfirmasi Pembayaran</a>
                    </li>
                    <li>
                        <a href="{{ URL('/testimoni') }}">Testimoni</a>
                    </li>
                    <li>
                        <a href="{{ URL('/tentang_kami') }}">Tentang Kami</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">BDR Computer</p>
                <div class="list-group">
                    @foreach ($data['brand'] as $brand)
                        <a href="{{ URL('brand/'.$brand->id_brand.'/'.str_slug($brand->nama_brand, '-')) }}" class="list-group-item">{{ $brand->nama_brand }}</a>
                    @endforeach                                        
                </div>
            </div>

            <div class="col-md-9">
                @include('flash::message')
                @yield('content')
            </div>
            <div class="demo">
                <span id="demo-setting">
                    <i class="fa fa-shopping-cart txt-color-blueDark fa-2x"></i></span>
                <div class="isi">
                    <h4>Rp {{ number_format($data['total'], "2", ",", ".") }}</h4>
                    @if (count($data['cart']) > 0)
                        <ol>
                            @foreach($data['cart'] as $dt_cart)
                            <li>{{ $dt_cart->name }}</li>
                            @endforeach                
                        </ol>
                    @else
                        <p>Kosong</p>
                    @endif                    
                    <a href="{{ URL('/cart') }}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Detail Cart</a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; BDR Computer Pati 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script type="text/javascript"> 
    $(function(){   
        var scrolle = $(document).scrollTop();
        var headere = $('.headerman').outerHeight();

        $(window).scroll(function() {
            var nilaine = $(document).scrollTop();

            if (nilaine > headere){
                $('.headerman').addClass('sembunyi');
                $('.navbar').addClass('navbar-fixed-top');
            } else {
                $('.headerman').removeClass('sembunyi')
                $('.navbar').removeClass('navbar-fixed-top')
            }

            scrolle = $(document).scrollTop(); 
         });
    });
    $('.selectpicker').selectpicker({
      style: 'btn-info',
      size: 4
    });

    $('#demo-setting').click(function () {        
        $('.demo').toggleClass('activate');
    })

    $(document).ready(function() {
        var $box = $('.box').css('width');
        var $img = $('.box img').width();
        var $gox = (($img/2 - (parseInt($box, 10) / 2)) + 'px');
        $('.box img').css('marginLeft', '-'+$gox);        
    });
    </script>

</body>

</html>
