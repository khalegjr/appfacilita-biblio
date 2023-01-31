<?php

namespace App\Http\Controllers;

use App\Http\Services\LoanService;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        $loan = new LoanService($request['book_id']);

        if ($loan->stateBook() === 'disponível') {
            $validated['return_date'] = Carbon::createFromFormat(
                'Y-m-d',
                $request->loan_date
            )->addWeek();

            $loan->createLoan($validated);

            return redirect('loans.index', 201)
                ->with('success', 'Empréstimo criado com sucesso.');
        }

        return redirect('loans.index', 401)
            ->with('error', 'Livro não disponível.');
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
