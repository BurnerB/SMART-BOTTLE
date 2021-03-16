<div class="navbar section no-padding" role="navigation">

    <div class="heading">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 hidden-xs">
                    <ul class="social">
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-facebook-square"></a></li>
                        <li><a href="#" class="fa fa-twitter-square"></a></li>
                    </ul>
                </div>
                <div class="col-sm-8">
                    <div class="finder">
                        <a href="{{ url('contact_us') }}">
                           contact us
                        </a>
                    </div>
                    <div class="finder">
                        <a href="https://wa.me/{{ $whatsapp->value }}" target="_blank">
                            <span class="fa fa-whatsapp"></span>
                            {{ $whatsapp->value }}
                        </a>
                    </div>
                    <div class="cart">
                        <a href="tel:{{ $mobile->value }}">
                            <span class="fa fa-mobile-phone"></span>
                            {{ $mobile->value }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="navbar-header">
            <a href="{{ url("/") }}" class="logo">
                <img src="{{ Storage::url($logo_dark->value) }}" alt="THE SMART BOTTLE LIQUOR STORE">
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse">
            <ul id="menu-primary" class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <span>
                    <a href="{{ url('/') }}">Home</a>
                    </span>
                </li>

                <li class="dropdown {{ Request::is('wines') ? 'active' : '' }}">
                        <span>
                        <a href="{{ url("wines") }}">Wines</a>
                        </span>
                    <ul class="dropdown-menu">
                        @foreach($wine_categories as $wine_category)
                            <li><a href="{{ route('wine_category',$wine_category->slug) }}">{{ $wine_category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="dropdown {{ Request::is('beers') ? 'active' : '' }}">
                        <span>
                        <a href="{{ url("beers") }}">Beers</a>
                        </span>
                    <ul class="dropdown-menu">
                        @foreach($beer_categories as $beer_category)
                            <li><a href="{{ route('beer_category',$beer_category->slug) }}">{{ $beer_category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="dropdown {{ Request::is('spirits') ? 'active' : '' }}">
                        <span>
                        <a href="{{ url("spirits") }}">Spirits</a>
                        </span>
                    <ul class="dropdown-menu">
                        @foreach($spirit_categories as $spirit_category)
                            <li><a href="{{ route('spirit_category',$spirit_category->slug) }}">{{ $spirit_category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="dropdown {{ Request::is('extras') ? 'active' : '' }}">
                        <span>
                        <a href="{{ url("extras") }}">Extras</a>
                        </span>
                    <ul class="dropdown-menu">
                        @foreach($extra_categories as $extra_category)
                            <li><a href="{{ route('extra_category',$extra_category->slug) }}">{{ $extra_category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <form method="get" action="{{ route('search') }}" name="search-header">
                    <input type="text" id="search" name="keywords" class="form-control" placeholder="search products.." />
                </form>


            </ul>
        </div>
    </div>
</div>
