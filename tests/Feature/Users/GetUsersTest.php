<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

beforeEach(fn () => User::factory(30)->create());

it('should return 200', function () {
    getJson(route('users.index'))->assertStatus(200);
});

it('has users', function () {
    $response = getJson(route('users.index'))->json('data');

    expect($response)->toHaveCount(25)->each(fn ($json) =>
        $json->toHaveKeys(['id', 'name', 'email'])
    );
});
