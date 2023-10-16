@extends('layouts.post')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$category->title}}</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @auth()
                        <div class=" mr-2 row col-md-12">
                            @foreach($category->posts as $post)
                                <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{asset('storage/'. $post->preview_image)}}" alt="blog post">
                                    </div>
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <p class="blog-post-category">{{$post->category->title}}</p>
                                        <form action="{{route("profile.liked.store", $post->id)}}" method="post">
                                            @csrf
                                            <span>{{$post->likedUsers->count()}}</span>
                                            <button type="submit" class="border-0 bg-transparent">
                                                @if(auth()->user()->likedPosts->contains($post->id))
                                                    <i class="fas fa-thumbs-up "></i>
                                                @else
                                                    <i class="far fa-thumbs-up "></i>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                    <a href="{{route("post.show", $post->id)}}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$post->title}}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endauth

                    @guest()
                        <div class=" mr-2 row col-md-12">
                            @foreach($category->posts as $post)
                                <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{asset('storage/'. $post->preview_image)}}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">{{$post->category->title}}</p>
                                    <a href="{{route("post.show", $post->id)}}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$post->title}}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endguest

                </div>
            </section>
{{--            <div class="row">
                <div class="">
                    <section>
                        <div class="row blog-post-row">
                            <div class="row">
                                <div class="mx-auto" style="margin-top: -80px">
                                    {{$posts->links()}}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>--}}
        </div>
    </main>
@endsection
