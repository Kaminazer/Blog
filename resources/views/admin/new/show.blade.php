@extends('layouts.post')
@section('content')
    <main class="blog-post">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="edica-page-title" data-aos="fade-up">{{$itemNews->title}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item ">
                                <a href="javascript:history.back()">{{__('Previous page')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{$itemNews->title}}</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <p class="edica-blog-post-meta mb-5" data-aos="fade-up" data-aos-delay="200">Created : {{$itemNews->created_at->format('F d,  Y')}}
            <section class="blog-post-featured-img text-center" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/' . $itemNews->image)}}" alt="image" class="w-50">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!!  $itemNews->content!!}
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
