<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h6>Help</h6>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('contact') }}">Contact us</a></li>
                    <li><a target="_blank" href="{{ route('login') }}">Staff login</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h6>Shop</h6>
                <ul>
                    <li><a href="{{ route('beers') }}">Beers</a></li>
                    <li><a href="{{ route('wines') }}">Wines</a></li>
                    <li><a href="{{ route('spirits') }}">Spirits</a></li>
                    <li><a href="{{ route('extras') }}">Extras</a></li>
                </ul>
            </div>
            <div class="col-sm-5 col-sm-push-1">
                <h6>Our information</h6>
                <p><i class="fa fa-map-marker"></i> {{ $address->value }}</p>
                <p><i class="fa fa-envelope-o"></i> <a href="mailto:{{ $email->value }}" class="__cf_email__" >{{ $email->value }}</a></p>
                <p><i class="fa fa-phone"></i><a href="tel:{{ $mobile->value }}">{{ $mobile->value }}</a></p>
                <ul class="social">
                    <li><a target="_blank" href="{{ $linkedin->value }}" class="fa fa-linkedin"></a></li>
                    <li><a target="_blank" href="{{ $facebook->value }}" class="fa fa-facebook-square"></a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p><script>document.write(new Date().getFullYear());</script> &copy; THE SMART BOTTLE LIQUOR STORE / <a TARGET="_blank" href="https://codeisystems.co.ke">DEVELOPED BY CODEI SYSTEMS</a></p>
        </div>
    </div>
</footer>
</div>
<script data-cfasync="false" src="{{ asset("user/js/email-decode.min.js") }}"></script>
<script src="{{ asset("user/js/jquery.min.js")}}"></script>
<script src="{{ asset("user/js/jquery-ui.min.js")}}"></script>
<script src="{{ asset("user/js/bootstrap.min.js")}}"></script>
<script src="{{ asset("user/js/headhesive.min.js")}}"></script>
<script src="{{ asset("user/js/matchHeight.min.js")}}"></script>
<script src="{{ asset("user/js/modernizr.custom.js")}}"></script>
<script src="{{ asset("user/js/waypoints.min.js")}}"></script>
<script src="{{ asset("user/js/counterup.js")}}"></script>
<script src="{{ asset("user/js/scrollme.min.js")}}"></script>
<script src="{{ asset("user/js/fakeLoader.min.js")}}"></script>
<script src="{{ asset("user/js/owl.carousel.js")}}"></script>
<script src="{{ asset("user/js/owl.autoplay.js")}}"></script>
<script src="{{ asset("user/js/4dfd2d448a.js")}}"></script>
<script src="{{ asset("user/js/custom.js")}}"></script>
