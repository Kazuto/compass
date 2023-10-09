<?php

namespace Tests\Http\Controllers\Settings\Bookmarks;

use App\Models\BookmarkGroup;
use App\Models\User;
use Illuminate\Testing\TestResponse;
use Symfony\Component\HttpFoundation\Response;

it('redirects to login when unauthenticated', function () {
    // Given
    BookmarkGroup::factory(5)->create();

    // When
    /** @var TestResponse $response */
    $response = $this
        ->get(route('settings.bookmarks.list'));

    // Then
    $response
        ->assertStatus(Response::HTTP_FOUND)
        ->assertRedirect(route('auth.login'));
});

it('shows bookmark groups', function () {
    // Given
    $bookmarkGroups = BookmarkGroup::factory(5)->create();

    // When
    /** @var TestResponse $response */
    $response = $this
        ->actingAs(User::factory()->create())
        ->get(route('settings.bookmarks.list'));

    // Then
    $response->assertStatus(Response::HTTP_OK);

    $bookmarkGroups->each(function (BookmarkGroup $bookmarkGroup) use ($response) {
        $response->assertSee($bookmarkGroup->name);
    });
});