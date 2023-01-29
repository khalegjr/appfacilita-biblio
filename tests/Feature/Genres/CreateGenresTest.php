<?php

use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('should show create genre page', function () {
    $response = $this->get(route('genres.create'));

    $response->assertStatus(200);
    $response->assertSeeText('criar/editar gênero');
});

it('should create one genre and redirect to index', function () {
    $genre = [
        'genre' => 'Romance',
    ];
    $response = $this->post(route('genres.store'), $genre);

    $this->assertDatabaseHas('genres', [
        'genre' => 'Romance',
    ]);
    $response->assertStatus(201);

});

it('requires genre', function () {
    $genre = Genre::factory()->create();

    $this->post(route('genres.store', $genre))
        ->assertSessionHasErrors(['genre']);
});
