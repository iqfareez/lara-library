<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Image;
use App\Models\Book;
use App\Exports\BooksExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "list all books";
        $books = Book::all();
        return view('admin.book_index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book;
        return view('admin.book_form', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // refer to current user
        $book = new Book;

        // do form validation
        $this->validate(
            $request,
            [
                'title' => 'required|min:3',
                // use '.' to concantenate string
                'description' => 'nullable',
                'isbn' => 'nullable',
                'status' => 'required|in:0,1',
                // File size cannot exceed 1MB
                'thumbnail' => 'nullable|mimes:jpeg,jpg,png|max:10000'
            ]
        );

        // if validation passed, save the data
        $book->title = $request['title'];
        $book->description = $request['description'];
        $book->isbn = $request['isbn'];
        $book->status = $request['status'];

        $image_name = 'thumbnail_' . time() . '.' . $request->thumbnail->getClientOriginalExtension();
        $directory = $_SERVER['DOCUMENT_ROOT'] . './uploads/thumbnail';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $img = Image::make($request->thumbnail->getRealPath());
        $img->fit(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($directory . '/' . $image_name);

        $book->thumbnail = $image_name;
        // dd($request);

        // actually save the data to Db
        $book->save();

        // inform user saved profile
        Session()->flash('success', 'New book have been saved!');

        return redirect()->route('admin.book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book_form', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // do form validation
        $this->validate(
            $request,
            [
                'title' => 'required|min:3',
                // use '.' to concantenate string
                'description' => 'nullable',
                'isbn' => 'nullable',
                'status' => 'required|in:0,1',
                'thumbnail' => 'nullable|mimes:jpeg,jpg,png|max:10000'

            ]
        );

        // if validation passed, save the data
        $book->title = $request['title'];
        $book->description = $request['description'];
        $book->isbn = $request['isbn'];
        $book->status = $request['status'];

        $image_name = 'thumbnail_' . time() . '.' . $request->thumbnail->getClientOriginalExtension();
        $directory = $_SERVER['DOCUMENT_ROOT'] . './uploads/thumbnail';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $img = Image::make($request->thumbnail->getRealPath());
        $img->fit(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($directory . '/' . $image_name);

        $book->thumbnail = $image_name;

        // actually save the data to Db
        $book->save();

        // inform user saved profile
        Session()->flash('success', 'New book have been updated!');

        return redirect()->route('admin.book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        Session()->flash('success', 'Book has been deleted!');

        return redirect()->route('admin.book.index');
    }

    public function exportExcel()
    {
        return Excel::download(new BooksExport, 'books.xlsx');
    }
}
