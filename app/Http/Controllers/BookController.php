<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10); // Fetch 4 books per page
        return view('book.index', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher_name' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'category' => 'required|string|max:255',
        ]);

        // Debug the request data

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher_name' => $request->publisher_name,
            'published_year' => $request->published_year,
            'category' => $request->category,
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully.');
    }


    public function show(Book $book)
    {

        return view('book.show', compact('book'));
    }

    public function edit(Book $book)
    {

        return view('book.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher_name' => 'required|string|max:255', // Add validation for publisher
            'published_year' => 'required|integer',
            'category' => 'required|string|max:255',
        ]);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher_name' => $request->publisher_name, // Ensure publisher is provided
            'published_year' => $request->published_year,
            'category' => $request->category,
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {

        $book->delete();
        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
