@extends('layouts.profile')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Edit comments')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item ">
                            <a href="{{route('profile.index')}}">{{__('Dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item ">
                            <a href="{{route('comment.index')}}">{{__('Comments')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{__("Edit comment")}}</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('comment.update', $comment->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-2">
                    <label for="message">{{__('Message')}}</label>
                    <textarea name="message" class="form-control w-50" id="message">{{$comment->message}}</textarea>
                </div>
                @error('message')
                <div class="text-danger pb-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
            </form>
        </div>
    </section>
@endsection
