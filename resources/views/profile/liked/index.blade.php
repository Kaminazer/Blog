@extends('layouts.profile')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__("Liked posts")}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{route("profile.index")}}">{{__("Dashboard")}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{__("Liked posts")}}</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="card col-5">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap ">
                            <thead>
                            <tr>
                                <th class="">{{__("ID")}}</th>
                                <th class="">{{__("Title")}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($posts == null)
                                <tr>
                                    <td colspan="3" class="text-center">{{__("No liked posts")}}</td>
                                </tr>
                            @else
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>
                                            <a href="{{route('post.show', $post->id)}}">{{$post->title}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
