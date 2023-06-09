<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Repository\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('category')->get();
        return view('admin.books', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.add-books-form', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, BookRepository $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
        ]);

        $book->create($request->only(['name', 'author', 'category']));

        return Redirect::route('admin.books.add')->with('status', 'book-added');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, BookRepository $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
        ]);

        $book->update($id, $request->only('name', 'author', 'category'));

        return Redirect::route('admin.books')->with('status', 'book-updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, BookRepository $book)
    {
        try {
            $book->remove($id);
            return Redirect::route('admin.books')->with('status', 'book-removed');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
