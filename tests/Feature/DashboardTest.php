<?php

it('has dashboard page', function () {
    $response = $this->get('/dashboard');

    $response->assertViewIs('dashboard');
});
