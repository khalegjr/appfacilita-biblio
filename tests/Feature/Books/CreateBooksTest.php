<?php

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(fn () => Genre::factory(10)->create());

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
        'genre' => [
            random_int(1, 10),
            random_int(1, 10)
        ]
    ];
    $response = $this->post(route('books.store'), $book);

    $this->assertDatabaseHas('books', [
        'title' => 'Título do Livro',
        'author' => 'Autor do livro',
        'state' => 'disponível',
    ]);
    $response->assertStatus(201);

    $this->assertDatabaseHas('book_genre', [
        'genre_id' => $book['genre'][0],
    ]);

    $this->assertDatabaseHas('book_genre', [
        'genre_id' => $book['genre'][1],
    ]);

});

it('requires title, author and state', function () {
    $book = Book::factory()->create();

    $this->post(route('books.store', $book))
        ->assertSessionHasErrors(['title', 'author', 'state']);
});
