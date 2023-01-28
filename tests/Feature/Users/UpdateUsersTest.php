<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
beforeEach(fn () => User::factory(1)->create());

it('should show edit user page', function () {
    $response = $this->get(route('users.edit', 1));

    $response->assertStatus(200);
    $response->assertSeeText('criar/editar usuário');
});

it('should update the user', function () {
    $user = [
        'name' => 'aa bb',
        'email' => 'email-editado@editado.org'
    ];

    $response = $this->put(route('users.update', 1), $user);

    $this->assertDatabaseHas('users', [
        'name' => 'aa bb',
        'email' => 'email-editado@editado.org'
    ]);
    $response->assertStatus(302);
    $response->assertRedirect('/users/1/edit');
});

it('requires name and email', function () {
    $user = User::factory()->create();

    $this->post(route('users.store', $user))
        ->assertSessionHasErrors(['name', 'email']);
});
