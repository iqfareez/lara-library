<html>

<head>
    <title>List of transaction</title>
</head>

<body>
    <table style="border: 1px #020101 solid; width: 100%;">
        <tr style="background-color: rgb(255, 234, 138); border: 1px #020101 solid; font-weight: bold;">
            <th>#</th>
            <th>Book Title</th>
            <th>User name</th>
            <th>Date borrow</th>
            <th>Status</th>
        </tr>
        @php($i = 0)
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $transaction->book->title }}</td>
                {{-- <td>{{ $book->description }}</td> --}}
                {{-- <td><img src="{{ asset('uploads/thumbnail/' . $book->thumbnail) }}" alt=""></td> --}}
                <td>{{ $transaction->date_borrow }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>
                    @if ($transaction->book->status == 0)
                        <span class="badge bg-danger">Late return</span>
                    @else
                        <span class="badge bg-success">OK</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
