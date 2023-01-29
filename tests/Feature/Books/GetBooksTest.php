<?php

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

beforeEach(fn () => Book::factory(30)->create());

it('should return books list page', function () {
    get(route('books.index'))->assertStatus(200);
});

it('has books', function () {
    $book = Book::orderBy('title', 'asc')->first();

    $this->get(route('books.index'))->assertSeeText($book->title);
});
