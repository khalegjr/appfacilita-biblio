<?php

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
beforeEach(fn () => Book::factory(1)->create());

it('should delete the book', function () {
    $book = Book::find(1)->first();

    $response = $this->delete(route('books.destroy', $book->id));

    $this->assertDatabaseMissing('books', [
        'title' => $book->title,
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/books');
});
