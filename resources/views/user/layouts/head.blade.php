@section('meta')
    @show
<link rel="shortcut icon" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ Storage::url($favicon->value) }}">
<link href="{{ asset("user/css/bootstrap.min.css")}}" rel="stylesheet">
<link href="{{ asset("user/css/fakeLoader.css")}}" rel="stylesheet">
<link href="{{ asset("user/css/owl-carousel.min.css")}}" rel="stylesheet">
<link href="{{ asset("user/css/style.css") }}" rel="stylesheet">
<link href="{{ asset("user/css/custom.css") }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Catamaran:400,500,600,700,800%7CGrand+Hotel" rel="stylesheet">

<link href="{{ asset("user/css/ie9.css") }}" rel="stylesheet">

<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

@section('additional-css')

@show


