<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        $q = isset($_GET['q']) ? $_GET['q'] : null;

        // Search for books title or description
        $books = Book::where('title', 'LIKE', '%' . $q . '%')
            // ->orWhere('description', 'LIKE', '%' . $q . '%')
            ->get();

        return view('pages.search', compact('books', 'q'));
    }
}
