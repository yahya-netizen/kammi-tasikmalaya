<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('super_admin can access users resource', function () {
    $superAdmin = User::factory()->create(['role' => 'super_admin']);

    $this->actingAs($superAdmin)
        ->get("/admin/users")
        ->assertStatus(200);
});

test('admin can access other resources', function ($resource) {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->get("/admin/{$resource}")
        ->assertStatus(200);
})->with([
    'agendas',
    'daurah-marhalahs',
    'galleries',
    'isu-daerahs',
    'komisariats',
    'kontaks',
    'pendaftaran-dms',
    'profil-organisasis',
    'publikasis',
]);
