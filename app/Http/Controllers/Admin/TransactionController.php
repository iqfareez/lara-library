<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Admin\Transaction;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Book $book)
    {
        $books = Book::all();
        $transactions = Transaction::where('book_id', $book->id)->get();

        return view('admin.transaction_index', compact('book', 'transactions', 'books'));
    }

    public function create(Book $book)
    {
        $transaction = new Transaction;
        $users = User::all();

        return view('admin.transaction_form', compact('book', 'transaction', 'users'));
    }

    public function store(Request $request, Book $book)
    {
        $transaction = new Transaction;
        // dd($request);

        $this->validate(
            $request,
            [
                'user_id' => 'required|exists:users,id',
                'date_borrow' => 'required|date_format:Y-m-d',
                'date_return' => 'required|date_format:Y-m-d',
            ]
        );

        // // check if book is available
        // $check = Transaction::where('book_id', $book->id)
        //     ->where('date_borrow', '<=', $request['date_borrow'])
        //     ->where('date_return', '>=', $request['date_return'])
        //     ->get();

        $transaction->user_id = $request['user_id'];
        $transaction->book_id = $book->id;
        $transaction->date_borrow = $request['date_borrow'];
        $transaction->date_return = $request['date_return'];


        $transaction->save();
        // dd($transaction->id);

        Session()->flash('success', 'The book has successfully been borrowed.');

        return redirect()->route('admin.transaction.index', $book->id);
    }

    public function update(Request $request, Book $book, Transaction $transaction)
    {
        $this->validate(
            $request,
            [
                'user_id' => 'required|exists:users,id',
                'date_borrow' => 'required|date_format:Y-m-d',
                'date_return' => 'required|date_format:Y-m-d',
            ]
        );


        // // check if book is available
        // $check = Transaction::where('book_id', $book->id)
        //     ->where('date_borrow', '<=', $request['date_borrow'])
        //     ->where('date_return', '>=', $request['date_return'])
        //     ->get();

        $transaction->user_id = $request['user_id'];
        $transaction->book_id = $book->id;
        $transaction->date_borrow = $request['date_borrow'];
        $transaction->date_return = $request['date_return'];

        $transaction->save();

        Session()->flash('success', 'The book transaction have been updated.');

        return redirect()->route('admin.transaction.index', $book->id);
    }

    public function edit(Book $book, Transaction $transaction)
    {
        $users = User::all();

        return view('admin.transaction_form', compact('book', 'transaction', 'users'));
    }

    public function destroy(Book $book, Transaction $transaction)
    {
        $transaction->delete();

        Session()->flash('success', 'The book transaction have been deleted.');

        return redirect()->route('admin.transaction.index', $book->id);
    }

    public function exportPdf()
    {
        $transactions = Transaction::all();
        $pdf = Pdf::loadView('admin.transaction_pdf', compact('transactions'));
        return $pdf->download('transactions.pdf');
    }
}
