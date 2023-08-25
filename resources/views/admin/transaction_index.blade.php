@extends('layouts.master')

@section('content')
    <select id="book_id" style="max-width:200px; margin-bottom:10px" class="form-control" onchange="refreshPage()">
        @foreach ($books as $b)
            <option value="{{ $b->id }}" @if ($b->id == $book->id) selected @endif>{{ $b->title }}
            </option>
        @endforeach
    </select>
    {{-- <div style="float:right;">
        <select name="filter_status" id="filter_status" onchange="{{ route('admin.transaction.index', $book->id) }}?=status=">
            <option value="ALL" @if ($filter_status == 'ALL') selected @endif>All</option>
            <option value="0" @if ($filter_status == '0') selected @endif>In Progress</option>
            <option value="1" @if ($filter_status == '1') selected @endif>Late return</option>
            <option value="1" @if ($filter_status == '1') selected @endif>Completed</option>
        </select>
    </div> --}}
    <div class="card">
        <div class="card-header">List of Transaction
            <div style="float:right;">
                <a href="{{ route('admin.transaction.pdf') }}" class="btn btn-secondary">Export PDF</a>
                <a href="{{ route('admin.transaction.create', $book->id) }}" class="btn btn-primary">Add New Transaction</a>
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
                        <th>User name</th>
                        <th>Date borrow</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @php($i = 0)
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $book->title }}</td>
                            {{-- <td>{{ $book->description }}</td> --}}
                            {{-- <td><img src="{{ asset('uploads/thumbnail/' . $book->thumbnail) }}" alt=""></td> --}}
                            {{-- <td>{{ $transaction->user()->name }}</td> --}}
                            <td>{{ $transaction->user->name }}</td>
                            <td>{{ $transaction->date_borrow }}</td>
                            <td>
                                @if ($book->status == 0)
                                    <span class="badge bg-danger">Late return</span>
                                @else
                                    <span class="badge bg-success">OK</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.transaction.destroy', [$book->id, $transaction->id]) }}"
                                    method="POST">
                                    <input type="hidden" value="DELETE" name="_method">
                                    @csrf
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.transaction.edit', [$book->id, $transaction->id]) }}">Edit</a>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            function refreshPage() {
                let book_id = document.getElementById('book_id').value;
                window.location.href = '/admin/' + book_id + '/transaction';
            }
        </script>
    @endsection
