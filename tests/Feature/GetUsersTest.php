<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function Pest\Laravel\get;
use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

beforeEach(fn () => User::factory(30)->create());

it('should return 200', function() {
    getJson(route('users.index'))->assertStatus(200);
});

it('has users')->assertDatabaseNotNull('users');
