<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('author')->get();

        return view('books.index', compact('books'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
       return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // $file = $request->file('filename');  
        $ext = $request->file('filename')->getClientOriginalExtension(); 
        $path = $request->file('filename')
            ->storeAs('public/book_images', $request->title .'.' . $ext);

        Book::create([
            'title'=> $request->title,
            'isbn'=> $request->isbn,
            'price'=> $request->price,
            'info'=> $request->info,
            'filename'=> 'book_images/' . $request->title .'.' . $ext,
            'date_available'=> $request->date_available,
            'author_id'=> $request->author_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book = Book::find($book)->first();

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
       return view('books.edit', compact('authors', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        $ext = $request->file('filename')->getClientOriginalExtension(); 
        $path = $request->file('filename')
            ->storeAs('public/book_images', $request->title .'.' . $ext);

       
            $book->title = $request->title;
            $book->isbn = $request->isbn;
            $book->price = $request->price;
            $book->info = $request->info;
            $book->filename = 'book_images/' . $request->title .'.' . $ext;
            $book->date_available = $request->date_available;
            $book->author_id = $request->author_id;

            $book->save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $path = $book->filename;
// dd($path);
        Storage::delete( 'public/' . $path );
        $book->delete();
    }
}
