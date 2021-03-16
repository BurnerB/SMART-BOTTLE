@extends('admin.layouts.app')

@section('main-content')
@section('headSection')
    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">

@endsection

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Create seo tags
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('seo.index') }}">seo tags</a></li>
                <li class="active">Add new</li>
            </ol>
        </section>


        <div class="margin-10px-top"></div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">General page settings</h3>
                        </div>


                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('seo.store') }}" method="post" >
                            {{ csrf_field() }}

                            <!-- /.box-body -->

                            <div class="box">

                                <!-- /.box-header -->
                                <div class="box-body pad">
                                    <div class="row">

                                        <div class="col-md-6 col-md-offset-3">
                                            @include('includes.messages')
                                            <div class="form-group">
                                                <label for="title">Page</label>
                                                <input type="text" class="form-control" id="meta_author" name="page" placeholder="eg home" value="{{ old('page') }}" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label for="subtitle">Page title</label>
                                                <input type="text" class="form-control" id="meta_title" name="page_title" placeholder="appears in tab" value="{{ old('page_title') }}" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="slug">Author meta tag</label>
                                                <input type="text" class="form-control" id="meta_description" name="author" placeholder="prefferably smart bottle liquor store" value="{{ old('author') }}" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">Title meta tag</label>
                                                <input type="text" class="form-control" id="meta_keywords" name="title" placeholder="Title appearing in google search results" value="{{ old('title') }}" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">Description</label>
                                                <textarea name="description" id="" cols="30" rows="4" style="align-content: left"
                                                          class="form-control">
                                                      {{ old('description') }}
                                                </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">Keywords</label>
                                                <input type="text" class="form-control" id="meta_keywords" name="keywords" placeholder="Enter SEO keywords separated by ," value="{{ old('keywords') }}" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">Language</label>
                                                <input type="text" class="form-control" id="meta_keywords" name="language" placeholder="eg English" value="{{ old('language') }}" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">Revisit after</label>
                                                <input type="text" class="form-control" id="meta_keywords" name="revisit_after" placeholder="eg 5 days" value="{{ old('revisit_after') }}" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">Custom css for page</label>
                                                <textarea name="css" cols="30" rows="5" style="align-content: left"
                                                          class="form-control">
                                                {{ old('css') }}
                                            </textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('seo.index') }}">Back</a>
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


    @endsection
