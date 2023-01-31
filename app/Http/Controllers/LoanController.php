<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::all();
        // dd($loans);
        return view('loan.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loan.loan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'loan_date' => 'required',
        ]);

        $validated['return_date'] = Carbon::createFromFormat(
            'Y-m-d',
            $request->loan_date
        )->addWeek();

        Loan::create($validated);

        return redirect('loans.index', 201)
            ->with('success', 'Empréstimo criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        return view('loan.loan', compact('loan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect()
            ->route('loans.index')
            ->with('success', 'Empréstimo deletado com sucesso.');
    }
}
