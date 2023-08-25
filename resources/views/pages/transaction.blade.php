@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">My Books</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Book</th>
                        <th>Description</th>
                        <th>ISBN</th>
                        <th>Borrowed Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->book->title }}</td>
                            <td>{{ $transaction->book->description }}</td>
                            <td><code>{{ $transaction->book->isbn }}</code></td>
                            <td>{{ $transaction->date_borrow }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
