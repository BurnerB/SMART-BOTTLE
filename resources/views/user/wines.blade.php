@extends('user/app')

{{--meta tags--}}
@section('meta')
    <title>{{ $seo_optimization->page_title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <meta name="author" content="{{ $seo_optimization->author }}">
    <!-- description -->
    <meta name="title" content="{{ $seo_optimization->title }}">
    <meta name="description" content="{{ $seo_optimization->description }}">
    <!-- keywords -->
    <meta name="keywords" content="{{ $seo_optimization->keywords }}">
    <meta name="language" content="{{ $seo_optimization->language }}">
    <meta name="revisit-after" content="{{ $seo_optimization->revisit_after }}">
@endsection
{{--end meta tags--}}

{{--additional css--}}
@section('additional-css')
    <style>
        {{ $seo_optimization->css }}
    </style>
@endsection
{{--end additional css--}}
@section('main-content')
    <div id="hero" class="single-page section" style="background-image: url({{ asset("user/images/single-hero-shop.jpg")}})">

        <div class="container">
            <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                <div class="col-md-10 col-md-offset-1">
                    <h1>Explore varieties of</h1>
                    <h2>Our wines</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid dark section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="horz-menu">
                        @foreach($categories as $category)
                            <li><span><a href="{{ route('wine_category',$category->slug) }}">{{ $category->name }}</a></span></li>
                        @endforeach
                        {{--                        <li class="active"><span><a href="#">All</a></span></li>--}}

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid light section no-padding">
        <div class="row">
            @if($wines->count()>0)
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
            @else
                <div class="row">
                    <div class="container">
                        <div class="alert alert-warning" style="margin:50px;">No products uploaded yet!!</div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="container-fluid super-dark section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                        {{ $wines->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </div>
@endsection

