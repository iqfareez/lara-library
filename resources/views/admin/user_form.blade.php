@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Add Details</div>
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <?php
            if ($user->id) {
                $route = route('admin.user.update', $user->id);
                $method = 'PUT';
            } else {
                $route = route('admin.user.store');
                $method = 'POST';
            }
            ?>

            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="{{ $method }}">
                @csrf <div class="form-group row">
                    <div class="col-3">Name</div>
                    <div class="col-9">
                        <input class="form-control" name="name" type="text"
                            value="{{ old('name', $user->name) }}"></input>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-3">Email</div>
                    <div class="col-9">
                        <input class="form-control" name="email" type="email"
                            value="{{ old('email', $user->email) }}"></input>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-3">Phone</div>
                    <div class="col-9">
                        <input class="form-control" name="phone" type="tel"
                            value="{{ old('phone', $user->phone) }}"></input>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-3">Password</div>
                    <div class="col-9">
                        <input class="form-control" name="password" type="password"></input>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-3">Confirm password</div>
                    <div class="col-9">
                        <input class="form-control" name="password_confirmation" type="password"></input>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-3">Role</div>
                    <div class="col-9">
                        <select class="form-control" name="role">
                            <option value="0" @if (old('role', $user->role) == 0) selected @endif>User
                            </option>
                            <option value="1" @if (old('role', $user->role) == 1) selected @endif>Admin
                            </option>
                        </select>
                        @error('role')
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
