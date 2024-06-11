
@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Update new')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item ">
                            <a href="{{route('admin.index')}}">{{__('Dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item ">
                            <a href="{{route('new.index')}}">{{__('News')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{__("Update new")}}</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.new.update', $itemNews)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form group">
                    <div class="mb-2">
                        <label for="title">{{__('Title')}}</label>
                        <input type="text" name="title" class="form-control col-4" id="title" placeholder="Введіть заголовок"
                               value= {{old('title') ? old('title') : $itemNews->title }}>
                    </div>
                    @error('title')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>{{__('Image')}}</label>
                    <div class="input-group col-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">{{__('Виберіть файл')}}</label>
                        </div>
                    </div>
                    @error('main_image')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" >
                    <div class="mb-2">
                        <label for="tags">{{__('Tags')}}</label>
                        <input type="text" name="tags" class="form-control col-4" id="tags" placeholder="Введіть теги через кому, без пропусків"
                               value="{{old('tags')}}">
                    </div>
                    @error('tags')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form group">
                    <div class="mb-2 col-7">
                        <label for="summernote">{{__('Content')}}</label>
                        <textarea id="summernote" name="content">{{old('content') ? old('content') : $itemNews->content}}</textarea>
                    </div>
                    @error('content')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="mb-2 col-7">
                        <label>{{__("Display")}}</label>
                        <div>
                            <input type="radio" id="option1" name="status_display"
                                   value= "1" {{ old('status_display') == 1 ? 'checked' : '' }}>
                            <label for="option1">Yes</label>
                            <input type="radio" id="option2" name="status_display"
                                   value= "0" {{ old('status_display') == 0 ? 'checked' : '' }}>
                            <label for="option2">No</label>
                        </div>
                    </div>
                    @error('display_status')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form group">
                    <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                </div>
            </form>
        </div>
    </section>
@endsection
