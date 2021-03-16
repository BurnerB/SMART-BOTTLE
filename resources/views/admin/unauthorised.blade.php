@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">

        <section class="content">
            <div class="error-page">

                <div class="error-content" style="margin-left:0px;">
                    <h2 class="headline text-red"><i class="fa fa-warning text-yellow"></i> Unauthorised action</h2>

                    <p>
                        You do not have permission to <strong>{{$message ?? 'perform this action'}}</strong>. Contact admin to grant you permission or <a href="{{ route('admin.home') }}">return to dashboard</a>
                    </p>

                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>

@endsection
