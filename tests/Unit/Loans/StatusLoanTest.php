<?php

use App\Http\Services\LoanService;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses (Tests\TestCase::class);
uses(RefreshDatabase::class);

beforeEach(function () {
    User::factory(1)->create();
    Book::create([
        'title' => 'título',
        'author' => 'autor',
    ]);



    Loan::create([
        'user_id' => 1,
        'book_id' => 1,
        'loan_date' => Carbon::now()->format('Y-m-d'),
        'return_date' => Carbon::now()->addWeek()->format('Y-m-d'),
    ]);
});

test('should change the status of the loan to devolvido', function () {
    $loanService = new LoanService(1);

    $loanService->changeStatusLoan(1, 'atrasado');

    $loan = Loan::find(1)->first();

    expect($loan->status)->toEqual('atrasado');
});

test('sholdnt change the status of the loan', function () {
    $loanService = new LoanService(1);

    $loanService->changeStatusLoan(1, 'status inválido');

    $loan = Loan::find(1)->first();

    expect($loan->status)->toEqual('em dia');
});
