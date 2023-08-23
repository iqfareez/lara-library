@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">List of Books

            <div style="float:right;">
                <a href="{{ route('admin.book.create') }}" class="btn btn-primary">Add New Book</a>
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
                        <th>Book Title</th>
                        {{-- <th>Description</th> --}}
                        <th>Thumbnail</th>
                        <th>ISBN</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @php($i = 0)
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $book->title }}</td>
                            {{-- <td>{{ $book->description }}</td> --}}
                            <td><img src="{{ asset('uploads/thumbnail/' . $book->thumbnail) }}" alt=""></td>
                            <td>{{ $book->isbn }}</td>
                            <td>
                                @if ($book->status == 0)
                                    <span class="badge bg-secondary">Unavailable</span>
                                @else
                                    <span class="badge bg-success">Available</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.book.destroy', $book->id) }}" method="POST">
                                    <input type="hidden" value="DELETE" name="_method">
                                    @csrf
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.book.edit', $book->id) }}">Edit</a>
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
