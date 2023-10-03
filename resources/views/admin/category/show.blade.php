@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Category')}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card col-4">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap ">
                        <thead>
                        <tr>
                            <th class="">{{__("ID")}}</th>
                            <th class="">{{__("Title")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="mb-3">
                <a href="{{route('category.index')}}" class="btn-block btn-primary btn-lg col-1" >{{__('Back')}}</a>
            </div>
        </div>
    </section>
@endsection
