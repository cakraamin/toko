<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BDR Computer Pati - Termurah</title>
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset("logo/favicon.ico") }}' />
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">    
    <style type="text/css">
        .error-template {padding: 40px 15px;text-align: center;}
        .error-actions {margin-top:15px;margin-bottom:15px;}
        .error-actions .btn { margin-right:10px; }
    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Maaf, Halaman yang anda minta tidak ditemukan
                </div>
                <div class="error-actions">
                    <a href="{{ URL('/') }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Halaman Awal </a><a href="http://www.jquery2dotnet.com" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                </div>
            </div>
        </div>
    </div>
</div>  
<script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>   
</body>

</html>
