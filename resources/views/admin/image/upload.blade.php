@extends('admin.layouts.app')

@section('main-content')
@section('headSection')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <style>
        .dropzone { border: 2px dashed #0087F7; border-radius: 5px; background: white; }
        .dropzone .dz-message { font-weight: 400; }
        .dropzone .dz-message .note { font-size: 0.8em; font-weight: 200; display: block; margin-top: 1.4rem; }

        *, *:before, *:after { box-sizing: border-box; }
    </style>
@endsection

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dropzone
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ url('admin/images') }}">Images</a></li>
                <li class="active">Upload</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Upload images to be used in blog</h3>

                </div>
                <div class="box-body">
                    <form action="{{ route('dropzone.store') }}" id="image-upload" files="true" enctype="multipart/form-data" class="dropzone dz-clickable">
                        {{ csrf_field() }}
                        <div class="dz-message">
                            Drop files here or click to upload.

                        </div>
                    </form>

                </div>

            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@section('footerSection')
    <!-- CK Editor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize         :       1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
    </script>

@endsection


    @endsection