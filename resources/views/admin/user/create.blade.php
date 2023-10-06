@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Create user')}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">{{__('Name')}}</label>
                    <div class="mb-2">
                        <input type="text" name="name" class="form-control col-4" id="name" value = "{{old('name')}}" placeholder="Enter name">
                    </div>
                    @error('name')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">{{__('Email')}}</label>
                    <div class="mb-2">
                        <input type="email" name="email" class="form-control col-4" id="email" value = "{{old('email')}}" placeholder="Enter email">
                    </div>
                    @error('email')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{__('Password')}}</label>
                    <div class="mb-2">
                        <input type="password" name="password" class="form-control col-4" id="password" placeholder="Enter password">
                    </div>
                    @error('password')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">{{__("Role")}}</label>
                    <div>
                        <select class="select2"  style="width: 30%;" name = "role"  id="role"  data-select2-id="role" tabindex="-1" aria-hidden="true">
                            <option value="" selected disabled>{{__("Select role")}}</option>
                            @foreach($roles as $id => $role)
                                <option value="{{$id}}" {{old('role') == $id ? 'selected' : ''}}>{{$role}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('role_id')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>
{{--                <div>
                    <label for="password-confirm">{{__('Confirm password')}}</label>
                    <div class="mb-2">
                        <input type="password" name="password_confirmation" class="form-control col-4" id="password-confirm" placeholder="Confirm password">
                    </div>
                    @error('password')
                    <div class="text-danger pb-2">{{ $message }}</div>
                    @enderror
                </div>--}}

                <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
            </form>
        </div>
    </section>
@endsection
