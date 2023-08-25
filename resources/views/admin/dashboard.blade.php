@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Admin Dashboard</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">Total Users <h2>{{ $count_book }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">Total Books <h2>{{ $count_book }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">Total Transaction <h2>{{ $count_transaction }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-3">

                <h4>Last 5 Transaction</h4>

                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>User name</th>
                        <th>Book Title</th>
                        <th>Date borrow</th>
                        <th>Date return</th>
                        <th>Status</th>
                    </tr>
                    @php($i = 1)
                    @foreach ($last_transaction as $transaction)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $transaction->user->name }}</td>
                            <td>{{ $transaction->book->title }}</td>
                            <td>{{ $transaction->date_borrow }}</td>
                            <td>{{ $transaction->date_return }}</td>
                            <td>
                                @if ($transaction->status == 0)
                                    <span class="badge bg-success">OK</span>
                                @else
                                    <span class="badge bg-danger">Late</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
