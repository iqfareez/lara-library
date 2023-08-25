@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">List of Users

            <div style="float:right;">
                {{-- <a href="{{ route('admin.user.export') }}" class="btn btn-secondary">Export Excel</a> --}}
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Add New User</a>
            </div>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        {{-- <th>Description</th> --}}
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    @php($i = 0)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td><code>{{ $user->email }}</code></td>
                            <td>
                                @if ($user->role == 'user')
                                    <span class="badge bg-primary">User</span>
                                @else
                                    <span class="badge bg-danger">Admin</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                    <input type="hidden" value="DELETE" name="_method">
                                    @csrf
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.user.edit', $user->id) }}">Edit</a>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
