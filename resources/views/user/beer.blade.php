@extends('user/app')

{{--meta tags--}}
@section('meta')
    <title>{{ $beer->name }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <meta name="author" content="{{ $seo->author }}">
    <!-- description -->
    <meta name="title" content="{{ $beer->name }}">
    <meta name="description" content="{{ $seo->description }}">
    <!-- keywords -->
    <meta name="keywords" content="{{ $seo->keywords }}">
    <meta name="language" content="{{ $seo->language }}">
    <meta name="revisit-after" content="{{ $seo->revisit_after }}">
@endsection
{{--end meta tags--}}

{{--additional css--}}
@section('additional-css')
    <style>
        {{ $seo->css }}
    </style>
@endsection
{{--end additional css--}}
@section('main-content')
    <div id="hero" class="single-page section" style="background-image: url({{ asset("user/images/single-hero-shop.jpg")}})">
        <div class="container">
            <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                <div class="col-md-10 col-md-offset-1">
                    <h1>{{ $beer->name }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid light section">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 matchHeight">
                    <div class="product-img-wrap">
                        <img src="{{ Storage::url($beer->image) }}" alt="{{ $beer->name }}" />
                    </div>
                </div>
                <div class="col-sm-6 col-sm-push-1 matchHeight">
                    <section class="alignMiddle mobile-center">
                        <header>
                            <h2>{{ $beer->name }}</h2>
                        </header>
                        {!! htmlspecialchars_decode($beer->body) !!}
                         <p class="price">ksh {{ $beer->price }}</p>
                         <a href="https://wa.me/{{ $whatsapp->value }}?text={{ urlencode($beer->text." of ".$beer->name) }}" class="btn btn-default"><span>Order on whatsapp</span></a>
                    </section>
                </div>
            </div>
        </div>
    </div>


@endsection
