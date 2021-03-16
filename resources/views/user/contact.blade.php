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
    <div id="hero" class="single-page section" style="background-image: url({{ asset("user/images/single-hero-contact.jpg")}})">

        <div class="container">
            <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                <div class="col-md-10 col-md-offset-1">
                    <h1>Send us a message, we'd love to</h1>
                    <h2>Hear from you</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid section no-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('includes.messages')
                </div>
                <div class="col-sm-6 matchHeight">
                    <ul class="contact-list alignMiddle">
                        <li>
                            <i class="fa fa-location-arrow"></i>
                            <div>
                                Address
                                <span>{{ $address->value }}</span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <div>
                                Email
                                <span><a href="malto: {{ $email->value }}">{{ $email->value }}</a></span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <div>
                                Telephone
                                <span><a href="tel:{{ $mobile->value }}">{{ $mobile->value }}</a></span>
                            </div>
                        </li>
                    </ul>
                    <div class="grey-background"></div>
                </div>
                <div class="col-sm-5 col-sm-push-1 matchHeight">
                    <section class="alignMiddle padding-80-0">
                        <form action="{{ route('enquiry.store') }}" method="POST" class=" scrollme animateme" data-when="enter" data-from="1" data-to="0" data-opacity="0" data-scale="1.1">
                            {{ csrf_field() }}
                            <input type="text" name="name" placeholder="Name" required="required">
                            <input type="email" name="email" placeholder="Email" required="required">
                            <textarea name="message" placeholder="Message" rows="5"></textarea>
                            <input type="submit" value="Send" class="btn btn-default">
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
