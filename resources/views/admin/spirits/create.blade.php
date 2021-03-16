@extends('admin.layouts.app')
@section('main-content')
@section('headSection')
    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
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
                Add spirits
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('spirits.index') }}">spirits</a></li>
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
                            <h3 class="box-title">spirits</h3>
                        </div>

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('spirits.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                @include('includes.messages')
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group text-center">
                                        <img src="{{ Storage::url('public/noimage.jpg') }}"  alt="User Image" id="preview" height="100px" width="100px" onchange="previewImage(this)">
                                    </div>

                                    <div class="form-group text-center">
                                        <div class="file">
                                            <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Product image</label>
                                            <input type="file" name="image" accept="image/*" class="form-control" id="avatar" required="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Product name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="required" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Select category/s</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Select categories"
                                                style="width: 100%;" name="categories[]">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Price (ksh)</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="eg price in ksh" required="required" value="{{ old('price') }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="name">Preset whatsapp order text</label>
                                        <textarea class="form-control" rows="3" placeholder="Message that customer will send in whatsapp...." name="whatsapp_text">
                                            {{ old('whatsapp_text') }}
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <textarea name="description" id="editor1" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            {{ old('description') }}
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">spirits status</label><br>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="1" name="status"
                                                          @if(old('status')==1)
                                                          checked
                                                        @endif
                                                > Activate</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Feature</label><br>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="1" name="feature"
                                                          @if(old('feature')==1)
                                                          checked
                                                    @endif
                                                > Feature product</label>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="{{ route('spirits.index') }}">Back</a>
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
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
        });

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
