<?php

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
beforeEach(fn () => Book::factory(1)->create());

it('should show edit book page', function () {
    $response = $this->get(route('books.edit', 1));

    $response->assertStatus(200);
    $response->assertSeeText('criar/editar livro');
});

it('should update the book', function () {
    $book = [
        'title' => 'Título do Livro',
        'author' => 'Autor do livro',
        'state' => 'disponível',
    ];

    $response = $this->put(route('books.update', 1), $book);

    $this->assertDatabaseHas('books', [
        'title' => 'Título do Livro',
        'author' => 'Autor do livro',
        'state' => 'disponível',
    ]);
    $response->assertStatus(302);
    $response->assertRedirect('/books/1/edit');
});

it('requires title, author and state', function () {
    $book = Book::factory()->create();

    $this->post(route('books.store', $book))
        ->assertSessionHasErrors(['title', 'author', 'state']);
});
