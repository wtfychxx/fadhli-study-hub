<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Book::all();
        
        return view('layouts.books.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $id = $request->input('id');
        
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'authors' => 'required|max:255',
            'publisher' => 'required|max:255',
            'release_year' => 'required|numeric',
            'page' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);
        //
        $data = [
            'title' => $request->input('title'),
            'authors' => $request->input('authors'),
            'publisher' => $request->input('publisher'),
            'release_year' => $request->input('release_year'),
            'page' => $request->input('page'),
            'stock' => $request->input('stock')
        ];

        if(trim($id) === ''){
            $book = Book::create($data);
    
            if($book){
                return redirect()
                    ->route('book')
                    ->with([
                        'success' => 'New book successfully created!'
                    ]);
            }else{
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occured, please try again'
                    ]);
            }
        }else{
            $book = Book::findOrFail($id);

            $book->update($data);

            if($book){
                return redirect()
                    ->route('book')
                    ->with([
                        'success' => 'New book successfully updated!'
                    ]);
            }else{
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occured, please try again'
                    ]);
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
        return view('layouts.books.form', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'authors' => 'required|max:255',
            'publisher' => 'required|max:255',
            'release_year' => 'required|numeric',
            'page' => 'required|numeric'
        ]);
        //
        $data = [
            'title' => $request->input('title'),
            'authors' => $request->input('authors'),
            'publisher' => $request->input('publisher'),
            'release_year' => $request->input('release_year'),
            'page' => $request->input('page')
        ];

        $post = Book::findOrFail($book->id);
        $book = Book::update($data);

        if($book){
            return redirect()
                ->route('book')
                ->with([
                    'success' => 'New book successfully created!'
                ]);
        }else{
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occured, please try again'
                ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        print_r('masuk');
        $book = Book::findOrFail($book->id);
        $book->delete();

        return redirect('book')->with('success', 'Game Data is successfully deleted');
    }
}
