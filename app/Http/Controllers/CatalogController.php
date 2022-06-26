<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $book = Book::all();

        return view('layouts.catalog.index', compact('book'));
    }

    public function filter(Request $request){
        $title = $request->get('title');
        $authors = $request->get('authors');
        $release_year = $request->get('release_year');

        $book = DB::table('books')
                    ->whereRaw('title like ? OR authors like ? or release_year like ?', ["%{$title}%", "%{$authors}%", "%{$release_year}%"])
                    ->get();

        return view('layouts.catalog.index', compact('book'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
            'book__id' => $request->input('book_id'),
            'user__id' => Auth::user()->id,
            'expire_date' => $request->input('expire_date')
        ];
        
        $loan = Loan::create($data);

        if($loan){
            return redirect()
                ->route('catalog')
                ->with([
                    'success' => 'Successfully apply for a loan'
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
