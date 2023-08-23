@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Add Details</div>
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <?php
            if ($book->id) {
                $route = route('admin.book.update', $book->id);
                $method = 'PUT';
            } else {
                $route = route('admin.book.store');
                $method = 'POST';
            }
            ?>

            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="{{ $method }}">
                @csrf <div class="form-group row">
                    <div class="col-3">Book title</div>
                    <div class="col-9">
                        <input class="form-control" name="title" type="text"
                            value="{{ old('title', $book->title) }}"></input>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-3">Description</div>
                    <div class="col-9">
                        <input class="form-control" name="description" type="text"
                            value="{{ old('description', $book->description) }}"></input>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-3">ISBN</div>
                    <div class="col-9">
                        <input class="form-control" name="isbn" type="text"
                            value="{{ old('isbn', $book->isbn) }}"></input>
                        @error('isbn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-3">Thumbnail</div>
                    <div class="col-9">
                        <input class="form-control" type="file" name="thumbnail">
                    </div>

                    <div class="col-3">Book status</div>
                    <div class="col-9">
                        <select class="form-control" name="status">
                            <option value="0" @if (old('status', $book->status) == 0) selected @endif>Unavailable
                            </option>
                            <option value="1" @if (old('status', $book->status) == 1) selected @endif>Available
                            </option>
                        </select>
                        @error('status')
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
