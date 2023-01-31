<?php

use App\Models\Book;
use App\Models\Genre;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

beforeEach(fn () => $this->seed());

it('should return loan list page', function () {
    get(route('loans.index'))->assertStatus(200);
});

it('has loans', function () {
    $loan = Loan::findOrFail(1)->first();

    $this->get(route('loans.index'))->assertSeeText($loan->loan_date);
});
