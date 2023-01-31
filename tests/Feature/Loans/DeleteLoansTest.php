<?php

use App\Models\Book;
use App\Models\Genre;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(fn () => $this->seed());

it('should delete the loan', function () {
    $loan = Loan::find(1)->first();

    $response = $this->delete(route('loans.destroy', $loan->id));

    $this->assertDatabaseMissing('loans', [
        'id' => $loan->id,
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/loans');
});
