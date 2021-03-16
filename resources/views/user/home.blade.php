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
    <div id="hero" class="carousel slide carousel-fade section no-padding" data-ride="carousel">

        <ol class="carousel-indicators">
            @php
                $i = 0;
            @endphp

            @foreach($banners as $banner)
                <li data-target="#hero" data-slide-to="{{ $i }}"  @if($i==0) class="active" @endif></li>
                @php
                    $i++;
                @endphp
            @endforeach

        </ol>

        <div class="carousel-inner">
            @php
                $j = 0;
            @endphp
            @foreach($banners as $banner)
                <div class="item @if($j==0) active @endif" style="background-image: url({{ Storage::url($banner->media) }})">

                    <div class="container">
                        <div class="row blurb scrollme animateme" data-when="exit" data-from="{{ $j }}" data-to="{{ $j+1 }}" data-opacity="0" data-translatey="100">
                            <div class="col-md-10 col-md-offset-1">
                                <h1>{{ $banner->short_title }}</h1>
                                <h2>{!! htmlspecialchars_decode($banner->title) !!}</h2>
                                <a href="{{ $banner->btn_link }}" target="_blank" class="btn btn-default">
                                    <span>{{ $banner->btn_text }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $j++;
                @endphp
            @endforeach

        </div>
    </div>

    <div class="container-fluid light section" style="background-image: url({{ asset("user/images/block-bg-2.jpg")}});">
        <div id="carousel-1" class="carousel slide carousel-fade bs-carousel" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @php
                    $k = 0;
                @endphp
                @foreach($offers as $offer)
                    <div class="item @if($k==1) active @endif">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 matchHeight">
                                    <img src="{{ Storage::url($offer->media) }}" alt="About our Brewery" class="alignMiddle" />
                                </div>
                                <div class="col-sm-5 col-sm-push-1 matchHeight">
                                    <section class="alignMiddle mobile-center">
                                        <header>
                                            <h2>{{ $offer->title }}</h2>
                                        </header>
                                        <p>
                                            {{ $offer->description }}
                                        </p>
                                        <a href="{{ $offer->btn_link }}" target="_blank" class="btn btn-default"><span>{{ $offer->btn_text }}</span></a>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $k++;
                    @endphp
                @endforeach

            </div>
            <a class="left carousel-control" href="#carousel-1" data-slide="prev">
                <span class="fa fa-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#carousel-1" data-slide="next">
                <span class="fa fa-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>

    <div class="container-fluid dark section" style="background-image: url({{ asset("user/images/block-bg-3.jpg")}});">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 matchHeight scrollme animateme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="-75">
                    <div class="alignMiddle mobile-center">
                        <header>
                            <h1>CHECK THIS OUT</h1>
                            <h2>Featured products</h2>
                        </header>
                        <p>
                        Smoky characters emerge as the beer warms, as do subtle drops of caramel. The overall dryness of the beer carries through to the finish, with a semi-burnt linger and bitter end.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-push-1 matchHeight">
                    <div class="owl-carousel">
                        @foreach($wines as $wine)
                            <div class="product item">
                                <a href="{{ route('wine',$wine->slug) }}">
                                    <span>View product</span>
                                    <img src="{{ Storage::url($wine->image) }}" alt="{{ $wine->name }}">
                                </a>
                                <h4><small>ksh {{ $wine->price }}</small></h4>
                            </div>
                        @endforeach
                        @foreach($beers as $beer)
                                <div class="product item">
                                    <a href="{{ route('beer',$beer->slug) }}">
                                        <span>View product</span>
                                        <img src="{{ Storage::url($beer->image) }}" alt="{{ $beer->name }}">
                                    </a>
                                    <h3>{{ $beer->name }}</h3>
                                    <h4>ksh {{ $beer->price }}</h4>
                                </div>
                        @endforeach
                        @foreach($spirits as $spirit)
                                <div class="product item">
                                    <a href="{{ route('spirit',$spirit->slug) }}">
                                        <span>View product</span>
                                        <img src="{{ Storage::url($spirit->image) }}" alt="{{ $spirit->name }}">
                                    </a>
                                    <h3>{{ $spirit->name }}</h3>
                                    <h4>ksh {{ $spirit->price }}</h4>
                                </div>
                        @endforeach
                        @foreach($extras as $extra)
                                <div class="product item">
                                    <a href="{{ route('extra',$extra->slug) }}">
                                        <span>View product</span>
                                        <img src="{{ Storage::url($extra->image) }}" alt="{{ $extra->name }}">
                                    </a>
                                    <h3><small>{{ $extra->name }}</small></h3>
                                    <h4>ksh {{ $extra->price }}</h4>
                                </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid light section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 latest-post odd matchHeight">
                    <a href="#"></a>
                    <div class="row">
                        <div class="col-sm-10 col-sm-push-1">
                            <header>
                                <span class="date">21 December</span>
                                <h2>Oktoberfest</h2>
                            </header>
                            <p>Brewed with licorice; a proprietary, hand-smoked malt; and almost a pound of East Kent Goldings hops per barrel.</p>
                            <p>Opaque brown in color, with muddy brown edges and a cola-colored head that drops quickly to a ringed lace. Strong and dominating licorice aroma with an underlying robust molasses-ness and highly roasted malts. Thick-ish, deep blackstrap molasses character (sweet, tangy nectar), quite robust.</p>
                            <p><a href="#" class="underline">Read more</a></p>
                        </div>
                    </div>
                    <div class="background" style="background-image: url({{ asset("user/images/latest-post-1.jpg")}});"></div>
                </div>
                <div class="col-sm-6 latest-post even matchHeight">
                    <a href="#"></a>
                    <div class="row">
                        <div class="col-sm-10 col-sm-push-1">
                            <header>
                                <span class="date">14 December</span>
                                <h2>Now stocked in NYC</h2>
                            </header>
                            <p>Brewed with licorice; a proprietary, hand-smoked malt; and almost a pound of East Kent Goldings hops per barrel.</p>
                            <p>Opaque brown in color, with muddy brown edges and a cola-colored head that drops quickly to a ringed lace. Strong and dominating licorice aroma with an underlying robust molasses-ness and highly roasted malts. Thick-ish, deep blackstrap molasses character (sweet, tangy nectar), quite robust.</p>
                            <p><a href="#" class="underline">Read more</a></p>
                        </div>
                    </div>
                    <div class="background" style="background-image: url({{ asset("user/images/latest-post-2.jpg")}});"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
