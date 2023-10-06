@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Edit user')}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('user.update', $user->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">{{__('Name')}}</label>
                    <div class="mb-2">
                        <input type="text" name="name" class="form-control col-4" id="name" value="{{$user->name}}">
                    </div>
                    @error('name')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">{{__('Email')}}</label>
                    <div class="mb-2">
                        <input type="text" name="email" class="form-control col-4" id="email" value="{{$user->email}}">
                    </div>
                    @error('email')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">{{__("Role")}}</label>
                    <div>
                        <select class="select2"  style="width: 33%;" name = "role"  id="role"  data-select2-id="role" tabindex="-1" aria-hidden="true">
                            <option value="" selected disabled>{{__("Select role")}}</option>
                            @foreach($roles as $id => $role)
                                <option value="{{$id}}" {{$id== $user->role ? 'selected' : ''}}>{{$role}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('role')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
            </form>
        </div>
    </section>
@endsection
