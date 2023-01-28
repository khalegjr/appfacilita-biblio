<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
beforeEach(fn () => User::factory(1)->create());

it('should delete the user', function () {
    $user = User::find(1)->first();

    $response = $this->delete(route('users.destroy', $user->id));

    $this->assertDatabaseMissing('users', [
        'email' => $user->email,
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/users');
});
