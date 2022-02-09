<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('projects');
});

it('shows a list of all the posts in the year', function () {

});