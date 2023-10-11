@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Edit tag')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item ">
                            <a href="{{route('admin.index')}}">{{__('Dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item ">
                            <a href="{{route('admin.tag.index')}}">{{__('Tags')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{__("Edit tag")}}</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.tag.update', $tag->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-2">
                    <label for="title">{{__('Title')}}</label>
                    <input type="text" name="title" class="form-control col-4" id="title" value="{{$tag->title}}">
                </div>
                @error('title')
                <div class="text-danger pb-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
            </form>
        </div>
    </section>
@endsection
