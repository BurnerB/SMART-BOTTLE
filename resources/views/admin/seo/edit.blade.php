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
            Edit seo tags
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('seo.index') }}">General settings</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>


    <div class="margin-10px-top"></div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">
                                        <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('seo.update',$seo->id) }}" method="post" >
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <!-- /.box-body -->

                        <div class="box">

                            <!-- /.box-header -->
                            <div class="box-body pad">
                                @include('includes.messages')
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <label for="title">Page</label>
                                        <input type="text" class="form-control" id="meta_author" name="page" placeholder="eg home" value="{{ $seo->page }}" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Page title</label>
                                        <input type="text" class="form-control" id="meta_title" name="page_title" placeholder="appears in tab" value="{{ $seo->page_title }}" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Author meta tag</label>
                                        <input type="text" class="form-control" id="meta_description" name="author" placeholder="prefferably Codei Systems" value="{{ $seo->author }}" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Title meta tag</label>
                                        <input type="text" class="form-control" id="meta_keywords" name="title" placeholder="Title appearing in google search results" value="{{ $seo->title }}" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Description</label>
                                        <textarea name="description" id="" cols="30" rows="5" class="form-control" style="align-content: left;">
                                          {{ $seo->description }}
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Keywords</label>
                                        <input type="text" class="form-control" id="meta_keywords" name="keywords" placeholder="Enter SEO keywords separated by ," value="{{ $seo->keywords }}" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Language</label>
                                        <input type="text" class="form-control" id="meta_keywords" name="language" placeholder="eg English" value="{{ $seo->language }}" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Revisit after</label>
                                        <input type="text" class="form-control" id="meta_keywords" name="revisit_after" placeholder="eg 5 days" value="{{ $seo->revisit_after }}" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Page css</label>
                                        <textarea name="css" id="" cols="30" rows="5" class="form-control">
                                          {{ $seo->css }}
                                        </textarea>
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