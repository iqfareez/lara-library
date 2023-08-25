<div>
    <a class="btn btn-primary w-100 mb-2" href="{{ route('home') }}">Home</a>
    <a class="btn btn-primary w-100 mb-2" href="{{ route('transaction.index') }}">My Books</a>
    <a class="btn btn-primary w-100 mb-2" href="{{ route('search') }}">Search Books</a>
    <a class="btn btn-primary w-100 mb-2" href="{{ route('profile.get') }}">Profile</a>

    @php
        use App\Models\Book;
        $books = Book::all();
    @endphp

    @if (Auth::user()->role == 'admin')
        <a href="{{ route('admin.dashboard.get') }}" class="btn btn-danger w-100 mb-2">
            Admin Dashboard</a>
        <a href="{{ route('admin.book.index') }}" class="btn btn-danger w-100 mb-2">
            Manage Books</a>
        {{-- TODO: How to pass book variable here? For now I just hardcoded it --}}
        <a href="{{ route('admin.transaction.index', $books->first()->id) }}" class="btn btn-danger w-100 mb-2">
            Manage Transaction</a>
        <a href="{{ route('admin.user.index') }}" class="btn btn-danger w-100 mb-2">
            Manage Users</a>
    @endif

    <a class="btn btn-primary w-100 mb-2" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">Logout</a>
</div>
