@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Posts')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item ">
                            <a href="{{route('admin.index')}}">{{__('Dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{__("Posts")}}</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="mb-3">
                <a href="{{route('admin.post.create')}}" class="btn-block btn-primary  btn-lg col-2" >{{__('Add new post')}}</a>
            </div>
            <div class="card col-5">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap ">
                        <thead>
                            <tr>
                                <th class="">{{__("ID")}}</th>
                                <th class="">{{__("Title")}}</th>
                                <th class="">{{__("Action")}}</th>
                            </tr>
                        </thead>

                        <tbody>
                        @if($posts->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center">{{__("No posts")}}</td>
                            </tr>
                        @else
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>
                                    <a href="{{route('admin.post.show', $post->id)}}">{{$post->title}}</a>
                                </td>
                                <td>
                                    <a class="text-success" href="{{route('admin.post.edit', $post->id)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('admin.post.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 bg-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>
                                        </button>

                                    </form>
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
    </section>
@endsection
