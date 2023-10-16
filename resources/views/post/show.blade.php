@extends('layouts.post')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta mb-5" data-aos="fade-up" data-aos-delay="200">{{$post->category->title}}</p>
            <p class="edica-blog-post-meta mb-5" data-aos="fade-up" data-aos-delay="200">{{__("Written by ")}} {{$post->user->name}} • {{$post->created_at->format('F d,  Y • h:i a •')}}
           <div class="d-flex justify-content-center align-items-baseline" data-aos="fade-up" data-aos-delay="200">
               <p class="edica-blog-post-meta">{{__("Featured •")}} {{$post->comments->count()}} {{__(" comment(s)")}}• {{$post->likedUsers->count()}} {{__("like(s)")}}</p>
               @auth()
                   <section class="">
                       <form action="{{route("profile.liked.store", $post->id)}}" method="post">
                           @csrf
                           <button type="submit" class="border-0 bg-transparent">
                               @if(auth()->user()->likedPosts->contains($post->id))
                                   <i class="fas fa-thumbs-up "></i>
                               @else
                                   <i class="far fa-thumbs-up "></i>
                               @endif
                           </button>
                       </form>
                   </section>
               @endauth
           </div>

            <section class="blog-post-featured-img text-center" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/' . $post->main_image)}}" alt="main_image" class="w-50">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!!  $post->content!!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">{{__("Related Posts")}}</h2>
                        <div class="row">
                            @if(!$relatedPosts->isEmpty())
                                @foreach($relatedPosts as $post)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{asset('storage/' . $post->preview_image)}}" alt="preview_image" class="post-thumbnail">
                                        <p class="post-category">{{$post->category->title}}</p>
                                        <a href="{{route("post.show", $post->id)}}" class="blog-post-permalink">
                                            <h5 class="post-title">{{$post->title}}</h5>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <p> {{__("No related posts.")}}</p>
                                </div>
                            @endif
                        </div>
                    </section>
                    <section class="card-comments mb-5" data-aos="fade-up">
                        <h2 class="section-title mb-4" >{{__("Comments")}}({{$comments->count()}})</h2>
                        @foreach($comments as $comment)
                            <div class="comment-text">
                                <span class="">{{$comment->user->name}}</span>
                                <span class="text-muted float-right">{{$comment->created_at->diffForHumans()}}</span>
                                <div class="comment-text">
                                    <p class="text-black-50">
                                        {{$comment->message}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </section>

                   @auth
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <section class="comment-section">
                            <h2 class="section-title mb-3" data-aos="fade-up">{{__("Leave a Reply")}}</h2>
                            <form action="{{route("profile.comment.store")}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="message" class="sr-only">{{__("Comment")}}</label>
                                        <textarea name="message" id="message" class="form-control" placeholder="Comment" rows="10"></textarea>
                                    </div>
                                </div>

                                <div>
                                    <input type="hidden" name="user_id" value="{{$post->user->id}}">
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                </div>

                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Send Message" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
