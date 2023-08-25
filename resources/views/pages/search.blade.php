@extends('layouts.master')

@section('content')
    <form action="{{ route('search') }}" method="get">
        <div class="card">
            <div class="card-header">Search Books
                <br>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ $q }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
            <div class="card-body">
                <h4>Result</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Thumbnail</th>
                        <th>ISBN</th>
                        <th>Status</th>
                    </tr>
                    @php($i = 0)
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->description }}</td>
                            <td><img width="50%" src="{{ asset('uploads/thumbnail/' . $book->thumbnail) }}"
                                    alt="{{ $book->title }}">
                            </td>
                            <td><code>{{ $book->isbn }}</code></td>
                            <td>
                                @if ($book->status == 0)
                                    <span class="badge bg-secondary">Unavailable</span>
                                @else
                                    <span class="badge bg-success">Available</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </form>
@endsection
