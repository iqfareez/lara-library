<div>
    <a class="btn btn-primary w-100 mb-2" href="{{ route('home') }}">Home</a>
    <a class="btn btn-primary w-100 mb-2" href="">My Books</a>
    <a class="btn btn-primary w-100 mb-2" href="{{ route('profile.get') }}">Profile</a>

    @if (Auth::user()->role == 'admin')
        <a href="{{ route('admin.book.index') }}" class="btn btn-danger w-100 mb-2">
            Manage Books</a>
    @endif

    <a class="btn btn-primary w-100 mb-2" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">Logout</a>
</div>
