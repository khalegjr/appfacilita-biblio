<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

beforeEach(fn () => User::factory(30)->create());

it('should return user list page', function () {
    get(route('users.index'))->assertStatus(200);
});

it('has users', function () {
    $user = User::orderBy('name', 'asc')->first();

    $this->get(route('users.index'))->assertSeeText($user->name);
});
