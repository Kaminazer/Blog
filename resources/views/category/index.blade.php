@extends('layouts.post')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{__("Category")}}</h1>
            <section class="featured-posts-section">
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            <a href="{{route('categories.posts.index', $category->id)}}" class="d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{$category->title}}</div>
                                </div>
                                <span class=" badge  badge-info rounded-pill">{{$category->posts->count()}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
{{--            <div class="row">
                <div class="">
                    <section>
                        <div class="row blog-post-row">
                            <div class="row">
                                <div class="mx-auto" style="margin-top: -80px">
                                    {{$categories->links()}}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>--}}
        </div>
    </main>
@endsection
