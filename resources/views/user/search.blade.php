@extends('user/app')

{{--meta tags--}}
@section('meta')
    <title>{{ $seo->page_title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <meta name="author" content="{{ $seo->author }}">
    <!-- description -->
    <meta name="title" content="{{ $seo->title }}">
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
                    <h2>Search results</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="author center-menu"><a>{{ ($wines->count() + $beers->count() + $spirits->count() + $extras->count()) }}</a> Product/s found with keyword
                        <a>{{ $keywords }}</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid light section no-padding">
        <div class="row">
            @if(($wines->count() + $beers->count() + $spirits->count() + $extras->count())>0)
                @foreach($wines as $wine)
                    <div class="col-sm-3 product-wrapper">
                        <div class="product">
                            <a href="{{ route('wine',$wine->slug) }}">
                                <span>More info</span>
                                <img src="{{ Storage::url($wine->image) }}" alt="{{ $wine->name }}">
                            </a>
                            <h3>{{ $wine->name }}</h3>
                            <h4>ksh {{ $wine->price }}</h4>
                        </div>
                    </div>
                @endforeach
                    @foreach($spirits as $spirit)
                        <div class="col-sm-3 product-wrapper">
                            <div class="product">
                                <a href="{{ route('spirit',$spirit->slug) }}">
                                    <span>More info</span>
                                    <img src="{{ Storage::url($spirit->image) }}" alt="{{ $spirit->name }}">
                                </a>
                                <h3>{{ $spirit->name }}</h3>
                                <h4>ksh {{ $spirit->price }}</h4>
                            </div>
                        </div>
                    @endforeach

                    @foreach($extras as $extra)
                        <div class="col-sm-3 product-wrapper">
                            <div class="product">
                                <a href="{{ route('extra',$extra->slug) }}">
                                    <span>More info</span>
                                    <img src="{{ Storage::url($extra->image) }}" alt="{{ $extra->name }}">
                                </a>
                                <h3>{{ $extra->name }}</h3>
                                <h4>ksh {{ $extra->price }}</h4>
                            </div>
                        </div>
                    @endforeach
                    @foreach($beers as $beer)
                        <div class="col-sm-3 product-wrapper">
                            <div class="product">
                                <a href="{{ route('beer',$beer->slug) }}">
                                    <span>More info</span>
                                    <img src="{{ Storage::url($beer->image) }}" alt="{{ $beer->name }}">
                                </a>
                                <h3>{{ $beer->name }}</h3>
                                <h4>ksh {{ $beer->price }}</h4>
                            </div>
                        </div>
                    @endforeach
            @else
                <div class="row">
                    <div class="container">
                        <div class="alert alert-warning" style="margin:50px;">Ops! No product could be found with the search term <b>{{ $keywords }}</b>!!</div>
                    </div>
                </div>
            @endif
        </div>
    </div>


@endsection

