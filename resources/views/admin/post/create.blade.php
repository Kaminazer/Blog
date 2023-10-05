@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Create post')}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form group">
                    <div class="mb-2">
                        <label for="title">{{__('Title')}}</label>
                        <input type="text" name="title" class="form-control col-4" id="title" placeholder="Enter title"
                        value="{{old('title')}}">
                    </div>
                    @error('title')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form group">
                    <div class="mb-2 col-7">
                        <label for="summernote">{{__('Content')}}</label>
                        <textarea id="summernote" name="content">{{old('content')}}</textarea>
                    </div>
                    @error('content')
                        <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">{{__("Category")}}</label>
                    <div>
                        <select class="select2"  style="width: 30%;" name = "category_id"  id="category_id"  data-select2-id="category_id" tabindex="-1" aria-hidden="true">
                            <option value="" selected disabled>{{__("Select category")}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" >
                    <label for="tags_id">{{__("Tags")}}</label>
                    <div>
                        <select class="select2" multiple="" id="tags_id"  name = "tags_id[]" data-select2-id="tags_id" style="width: 30%;" >
                            @foreach($tags as $tag)
                                <option {{is_array(old('tags_id')) && in_array($tag->id, old('tags_id')) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('tags_id')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">{{__('Add preview image')}}</label>
                    <div class="input-group col-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="preview_image" name="preview_image">
                            <label class="custom-file-label" for="preview_image">{{__('Choose file')}}</label>
                        </div>
                    </div>
                    @error('preview_image')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">{{__('Add main image')}}</label>
                    <div class="input-group col-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="main_image" name="main_image">
                            <label class="custom-file-label" for="main_image">{{__('Choose file')}}</label>
                        </div>
                    </div>
                    @error('main_image')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form group">
                    <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
                </div>
            </form>
        </div>
    </section>
@endsection
