<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BookCreateUpdateRequest;

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
    public function store(BookCreateUpdateRequest $request)
    {
         // $file = $request->file('filename');  
        $ext = $request->file('filename')->getClientOriginalExtension(); 
        $filename = str_replace(' ', '_', $request->title);
        $path = $request->file('filename')
            ->storeAs('public/book_images', $filename .'.' . $ext);

        Book::create([
            'title'=> $request->title,
            'isbn'=> $request->isbn,
            'price'=> $request->price,
            'info'=> $request->info,
            'filename'=> 'book_images/' . $filename .'.' . $ext,
            'date_available'=> $request->date_available,
            'author_id'=> $request->author_id,
        ]);

        return redirect()->route('books.index')
            ->with('success', 'New book created!');
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
    public function update(BookCreateUpdateRequest $request, Book $book)
    {

        $ext = $request->file('filename')->getClientOriginalExtension(); 
        $filename = str_replace(' ', '_', $request->title);
        $path = $request->file('filename')
            ->storeAs('public/book_images', $filename .'.' . $ext);       
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->info = $request->info;
        $book->filename = 'book_images/' . $filename .'.' . $ext;
        $book->date_available = $request->date_available;
        $book->author_id = $request->author_id;        
        $book->save();
        
        return redirect()->route('books.index')
                ->with('success', 'A book was edited!');        
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
        Storage::delete( 'public/' . $path );
        $book->delete();
        return redirect()->route('books.index')
                ->with('success', 'A book was deleted!');
    }
}
