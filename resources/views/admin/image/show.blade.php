@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Images
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Images</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">

                    <a href="{{ url('admin/upload-images') }}" class="btn btn-primary"><span class="fa fa-plus"></span>   Upload new</a>

            </div>

            <div class="box-body">
                @include('includes.messages')
                <div class="row">


                    <form action="{{ route('dropzone.delete') }}" method="post">
                        {{ @csrf_field() }}
                        @foreach($images as $image)

                            <div class="col-md-4">
                                <img src="{{ asset('images/' . $image->getFilename()) }}" width="90%">
                                <button type="submit" name="delete" value="{{ $image->getFilename() }}" class="btn btn-xs btn-danger" style="margin-top:5px"><span class="fa fa-trash"> delete</span></button>
                            </div>


                        @endforeach
                    </form>

                </div>
               
            </div>

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

@endsection