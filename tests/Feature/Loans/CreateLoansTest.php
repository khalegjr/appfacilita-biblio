<?php

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    User::factory(1)->create();
    Book::factory(1)->create();
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
    $response->assertStatus(201);
});

// it('requires user id, book id and loan date', function () {
//     $loan = Loan::factory()->create();

//     $this->post(route('loans.store', $loan))
//         ->assertSessionHasErrors([
//             'user_id',
//             'book_id',
//             'loan_date'
//         ]);
// });
