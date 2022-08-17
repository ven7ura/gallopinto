<?php

it('has dashboard page', function () {
    $response = $this->get('/dashboard');

    $response->assertStatus(200)
        ->assertViewIs('dashboard');
});

it('loads the correct view blade file for the dashboard', function () {
    $response = $this->get('/dashboard');

    $response->assertViewIs('dashboard');
});
