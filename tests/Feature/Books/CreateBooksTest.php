<?php

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('should show create book page', function () {
    $response = $this->get(route('books.create'));

    $response->assertStatus(200);
    $response->assertSeeText('criar/editar livro');
});

it('should create one book and redirect to index', function () {
    $book = [
        'title' => 'Título do Livro',
        'author' => 'Autor do livro',
        'state' => 'disponível',
    ];
    $response = $this->post(route('books.store'), $book);

    $this->assertDatabaseHas('books', [
        'title' => 'Título do Livro',
        'author' => 'Autor do livro',
        'state' => 'disponível',
    ]);
    $response->assertStatus(201);

});

it('requires title, author and state', function () {
    $book = Book::factory()->create();

    $this->post(route('books.store', $book))
        ->assertSessionHasErrors(['title', 'author', 'state']);
});
