<?php

use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

beforeEach(fn () => Genre::factory(30)->create());

it('should return genres list page', function () {
    get(route('genres.index'))->assertStatus(200);
});

it('has genres', function () {
    $genre = Genre::orderBy('title', 'asc')->first();

    $this->get(route('genres.index'))->assertSeeText($genre->genre);
});
