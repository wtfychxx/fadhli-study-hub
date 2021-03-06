<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $loan = Loan::select(DB::raw("id, (select title from books where id = book__id) as title, DATE_FORMAT(created_at, '%Y-%m-%d') as loan_date, DATE_FORMAT(expire_date, '%Y-%m-%d') as expire_date"))->where(['user__id' => Auth::user()->id, 'status' => 'Active'])->get();

        return view('layouts.loans.index', compact('loan'));
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
    public function edit(Loan $loan, Request $request){
        $data = [
            'status' => 'Non Active',
            'penalty' => $request->input('penalty')
        ];

        $loan = Loan::findOrFail($loan->id);
        $loan->update($data);

        if($loan){
            return redirect()
                ->route('mybook')
                ->with([
                    'success' => 'The book is successfully returned to library!'
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
