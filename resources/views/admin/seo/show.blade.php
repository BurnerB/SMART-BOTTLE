@extends('admin.layouts.app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                General page settings
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">page settings</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('seo.create') }}" class="btn btn-info"><span class="fa fa-plus"></span> Add new</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('includes.messages')
                   <div class="table-responsive">
                       <table id="example1" class="table table-bordered table-striped">
                           <thead>
                           <tr>
                               <th>S.no</th>
                               <th>Page</th>
                               <th>Page title</th>
                               <th>Author</th>
                               <th>Title</th>
                               <th>description</th>
                               <th>Keywords</th>
                               <th>Revisit after</th>
                               <th>Actions</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($seos as $seo)
                               <tr>
                                   <td>{{ $loop->index + 1 }}</td>
                                   <td>{{ $seo->page }}</td>
                                   <td>{{ $seo->page_title }}</td>
                                   <td>{{ $seo->author }}</td>
                                   <td>{{ $seo->title }}</td>
                                   <td>{{ $seo->description }}</td>
                                   <td>{{ $seo->keywords }}</td>
                                   <td>{{ $seo->revisit_after }}</td>
                                   <td>
                                       <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="{{ route('seo.edit',$seo->id) }}" class="badge bg-light-blue " disabled><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                       <form id="delete-form-{{ $seo->id }}" action="{{ route('seo.destroy',$seo->id) }}" style="display: none;" method="post">
                                           {{ @csrf_field() }}
                                           {{ @method_field('DELETE') }}
                                       </form>
                                       <a data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="
                                           if(confirm('Are you sure you want to delete this setting?'))
                                           {
                                               event.preventDefault();
                                               document.getElementById('delete-form-{{ $seo->id }}').submit();
                                           }
                                           else
                                           {
                                               event.preventDefault();
                                           }
                                           " class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i>
                                       </a>
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                           <tfoot>
                           <tr>
                               <th>S.no</th>
                               <th>Page</th>
                               <th>Page title</th>
                               <th>Author</th>
                               <th>Title</th>
                               <th>description</th>
                               <th>Keywords</th>
                               <th>Revisit after</th>
                               <th>Actions</th>
                           </tr>
                           </tfoot>
                       </table>
                   </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

@section('footerSection')
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection

@endsection