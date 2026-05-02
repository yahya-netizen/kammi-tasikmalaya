<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('public pages are accessible', function ($url) {
    $this->get($url)->assertStatus(200);
})->with([
    '/',
    '/galeri',
    '/publikasi',
    '/isu-daerah',
    '/kaderisasi',
    '/komisariat',
    '/agenda',
    '/bkm',
    '/tentang/sejarah',
    '/tentang/visi-misi',
    '/tentang/mars',
    '/tentang/hymne',
    '/kontak',
    '/login',
    '/register',
]);

test('dashboard is accessible for authenticated users', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertStatus(200);
});

test('profile is accessible for authenticated users', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/profil')
        ->assertStatus(200);
});

test('admin panel is accessible for admins', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->get('/admin')
        ->assertStatus(200);
});

test('admin panel is not accessible for regular users', function () {
    $user = User::factory()->create(['role' => 'member']);

    $this->actingAs($user)
        ->get('/admin')
        ->assertStatus(403);
});
