<?php

use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
beforeEach(fn () => Genre::factory(1)->create());

it('should delete the genre', function () {
    $genre = Genre::find(1)->first();

    $response = $this->delete(route('genres.destroy', $genre->id));

    $this->assertDatabaseMissing('genres', [
        'title' => $genre->title,
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/genres');
});
