@extends('admin.layouts.app')
@section('main-content')
@section('headSection')
    <style>
        .file {
            position: relative;
            height: 35px;
        }

        .file > input[type="file"] {
            position: absolute;
            opacity: 0;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0
        }


    </style>
@endsection

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add reviews
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('testimonials.index') }}">reviews</a></li>
                <li class="active">Create</li>
            </ol>
        </section>



        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Reviews</h3>
                        </div>

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('testimonials.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                @include('includes.messages')
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group text-center">
                                        <img src="{{ Storage::url('public/noimage.jpg') }}"  alt="User Image" id="preview" height="100px" width="100px" onchange="previewImage(this)" class="img-circle">
                                    </div>

                                    <div class="form-group text-center">
                                        <div class="file">
                                            <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Select avatar</label>
                                            <input type="file" name="avatar" accept="image/*" class="form-control" id="avatar" required="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Client name</label>
                                        <input type="text" class="form-control" id="slug" name="name" placeholder="eg Margaret Wambui" required="required" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Client role</label>
                                        <input type="text" class="form-control" id="slug" name="role" placeholder="e.g CEO Microsoft" required="required" value="{{ old('role') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Review</label>
                                        <textarea class="form-control" rows="3" placeholder="Write short description...." name="review">
                                            {{ old('review') }}
                                        </textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Status</label><br>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="1" name="status"
                                                          @if(old('status')==1)
                                                          checked
                                                        @endif
                                                > Activate</label>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="{{ route('testimonials.index') }}">Back</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.content-wrapper -->
@section('footerSection')
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        $(function () {

            // instance, using default configuration.
            CKEDITOR.replace( 'editor1');

        })
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#avatar").change(function(){
            readURL(this);
        });
    </script>
@endsection
@endsection