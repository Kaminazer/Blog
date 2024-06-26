@extends('layouts.post')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{__("News")}}</h1>
            @auth()
                <div class="mb-3">
                    <a href="{{route('admin.new.create')}}" class="btn-block btn-primary  btn-lg col-3" >{{__('Add new item news')}}</a>
                </div>
            @endauth
            <section class="featured-posts-section">
                <div class="row">
                    <div class=" mr-2 row col-md-12">
                        @foreach($news as $itemNews)
                            <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{asset('storage/'. $itemNews->image)}}" alt="image news">
                                </div>
                                <a href="{{route("new.show", $itemNews->id)}}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{$itemNews->title}}</h6>
                                </a>
                                 <p>{{$itemNews->created_at->format('d M Y')}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="">
                    <section>
                        <div class="row blog-post-row">
                            <div class="row">
                                <div class="mx-auto" style="margin-top: -80px">
                                    {{$news->links()}}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
