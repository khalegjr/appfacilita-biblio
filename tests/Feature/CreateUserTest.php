<?php

it('should show create user page', function () {
    $response = $this->get(route('users.create'));

    $response->assertStatus(200);
});
