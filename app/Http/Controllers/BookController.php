<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', [
            'books' => Book::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): View
    {
        return view('books.show', [
            'book' => $book,
            'authors' => $book->authors,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): View
    {
        $authors = Author::whereDoesntHave('books', function (Builder $query) use ($book) {
            $query->where('book_id', $book->id);
        })->orderBy('first_name')->get();

        return view('books.edit', [
            'book' => $book,
            'authors' => $authors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => ['required', 'regex:/^\d+(,\d|,\d{2})?$/i'],
            'release_date' => 'required|integer|between:1901,2155',
            'language' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ],
            [
                'title.required' => 'Nõutav väli',
                'price.required' => 'Nõutav väli',
                'price.regex' => 'Nõutav väli',
                'release_date.required' => 'Nõutav väli',
                'language.required' => 'Nõutav väli',
                'type.required' => 'Nõutav väli',
                'release_date.between' => 'Valitud vahemik peab olema 1901 ja 2155 vahel',
            ]);

        $book->update($validated);

        return redirect(route('books.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect(route('books.index'));
    }

    public function detachAuthor(Request $request, Book $book): RedirectResponse
    {

        $book->authors()->detach($request->author_id);

        return redirect()->back();
    }

    public function attachAuthor(Request $request, Book $book): RedirectResponse
    {

        $book->authors()->attach($request->author_id);

        return redirect()->back();
    }
}
