<!doctype html>
<html class="no-js" lang="en">
<head>
    @include('user/layouts/head')

</head>
<body>
<div id="fakeLoader"></div>

<div class="wrapper">
    <!-- start header -->


@include('user/layouts/nav')
<!-- end header -->

@section('main-content')
    @show


<!-- start footer -->
@include('user/layouts/footer')
</body>
</html>
