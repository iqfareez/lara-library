@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Add Details</div>
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <?php
            if ($transaction->id) {
                $route = route('admin.transaction.update', [$book->id, $transaction->id]);
                $method = 'PUT';
            } else {
                $route = route('admin.transaction.store', [$book->id]);
                $method = 'POST';
            }
            ?>

            <form action="{{ $route }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="{{ $method }}">
                <div class="form-group row">
                    <div class="col-3">Book title</div>
                    <div class="col-9">
                        {{ $book->title }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">Description</div>
                    <div class="col-9">
                        {{ $book->description }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">ISBN</div>
                    <div class="col-9">
                        <code>{{ $book->isbn }}</code>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">Thumbnail</div>
                    <div class="col-9">
                        <img src="{{ asset('uploads/thumbnail/' . $book->thumbnail) }}" alt="">
                    </div>
                </div>

                {{-- <div class="col-3">Book status</div>
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
                    </div> --}}
                <div class="form-group row">

                    <div class="col-3">Select user</div>
                    <div class="col-9">
                        <select class="form-control" name="user_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if (old('user_id', $transaction->user_id) == $user->id) selected @endif>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-3">Date borrow</div>
                    <div class="col-9">
                        <input class="form-control" name="date_borrow" type="date"
                            value="{{ old('date_borrow', $transaction->date_borrow) }}"></input>
                        @error('date_borrow')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-3">Date Return</div>
                    <div class="col-9">
                        <input class="form-control" name="date_return" type="date"
                            value="{{ old('date_return', $transaction->date_return) }}"></input>
                        @error('date_return')
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
