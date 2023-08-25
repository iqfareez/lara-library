<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Transaction;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $count_user = User::where('role', 'user')->count();
        $count_book = Book::count();
        $count_transaction = Transaction::count();

        $last_transaction = Transaction::orderBy('created_at', 'DESC')->get()->take(5);

        return view('admin.dashboard', compact('count_user', 'count_book', 'count_transaction', 'last_transaction'));
    }
}
