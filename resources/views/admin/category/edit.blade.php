@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Edit category')}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('category.update', $category->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-2">
                    <label for="title">{{__('Title')}}</label>
                    <input type="text" name="title" class="form-control col-4" id="title" value="{{$category->title}}">
                </div>
                @error('title')
                <div class="text-danger pb-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
            </form>
        </div>
    </section>
@endsection
