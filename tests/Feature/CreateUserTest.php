<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('should show create user page', function () {
    $response = $this->get(route('users.create'));

    $response->assertStatus(200);
});

it('should create one user', function () {
    $user = [
        'name' => 'user test',
        'email' => 'email@test.org'
    ];

    $response = $this->post(route('users.store', $user));

    $response->assertStatus(201);
    $response->assertRedirect('/users');
    $this->assertDatabaseHas('users', [
        'name' => 'user test',
        'email' => 'email@test.org'
    ]);
});
