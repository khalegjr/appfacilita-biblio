<?php

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    User::factory(1)->create();
    Book::create([
        'title' => 'título',
        'author' => 'autor',
    ]);
});

it('should show page to make loan', function () {
    $response = $this->get(route('loans.create'));

    $response->assertStatus(200);
    $response->assertSeeText('fazer empréstimo');
});

it('should create one loan and redirect to index', function () {
    $user = User::find(1);
    $book = Book::find(1);
    $current = Carbon::now()->format('Y-m-d');

    $loan = [
        'user_id' => $user->id,
        'book_id' => $book->id,
        'loan_date' => $current,
    ];

    $response = $this->post(route('loans.store'), $loan);

    $this->assertDatabaseHas('loans', [
        'user_id' => $user->id,
        'book_id' => $book->id,
        'loan_date' => $current,
    ]);

    $book = Book::find(1);
    $this->assertDatabaseHas('books', [
        'id' => $book->id,
        'state' => 'emprestado',
    ]);

    $response->assertStatus(201);
});
