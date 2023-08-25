@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Update Profile</div>
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <form action="{{ route('profile.post') }}"" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-2">Nama</div>
                    <div class="col-10">
                        <input class="form-control" name="name" type="text"
                            value="{{ old('name', $user->name) }}"></input>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">Emel</div>
                    <div class="col-10">
                        <input class="form-control" name="email" type="text"
                            value="{{ old('email', $user->email) }}"></input>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">Phone</div>
                    <div class="col-10">
                        <input class="form-control" name="phone" type="text"
                            value="{{ old('phone', $user->phone) }}"></input>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">Password</div>
                    <div class="col-10">
                        <input class="form-control" name="password" type="password"></input>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2">Confirm Password</div>
                    <div class="col-10">
                        <input class="form-control" name="password_confirmation" type="password"></input>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
