<?php

use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
beforeEach(fn () => Genre::factory(1)->create());

it('should show edit genre page', function () {
    $response = $this->get(route('genres.edit', 1));

    $response->assertStatus(200);
    $response->assertSeeText('criar/editar gênero');
});

it('should update the genre', function () {
    $genre = [
        'genre' => 'Poesia',
    ];

    $response = $this->put(route('genres.update', 1), $genre);

    $this->assertDatabaseHas('genres', [
        'genre' => 'Poesia',
    ]);
    $response->assertStatus(302);
    $response->assertRedirect('/genres/1/edit');
});

it('requires genre', function () {
    $genre = Genre::factory()->create();

    $this->post(route('genres.store', $genre))
        ->assertSessionHasErrors(['genre']);
});
