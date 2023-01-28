<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('should show create user page', function () {
    $response = $this->get(route('users.create'));

    $response->assertStatus(200);
    $response->assertSeeText('criar/editar usuário');
});

it('should create one user and redirect to index', function () {
    $user = [
        'name' => 'user test',
        'email' => 'email@test.org',
    ];
    $response = $this->post(route('users.store'), $user);

    $this->assertDatabaseHas('users', [
        'name' => 'user test',
        'email' => 'email@test.org'
    ]);
    $response->assertStatus(201);

});

it('requires name and email', function () {
    $user = User::factory()->create();

    $this->post(route('users.store', $user))
        ->assertSessionHasErrors(['name', 'email']);
});
