<?php

use App\Models\Publikasi;
use App\Models\IsuDaerah;
use App\Models\Komisariat;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('publikasi show page is accessible', function () {
    $user = User::factory()->create();
    $publikasi = Publikasi::create([
        'judul' => 'Test Berita',
        'slug' => 'test-berita',
        'isi' => 'Isi berita test.',
        'ringkasan' => 'Ringkasan test.',
        'status' => 'publikasi',
        'tipe' => 'berita',
        'user_id' => $user->id,
    ]);

    $this->get("/publikasi/{$publikasi->slug}")
        ->assertStatus(200)
        ->assertSee('Test Berita');
});

test('isu daerah show page is accessible', function () {
    $user = User::factory()->create();
    $isu = IsuDaerah::create([
        'judul' => 'Test Isu',
        'deskripsi' => 'Deskripsi test.',
        'konten' => 'Isi isu test.',
        'kategori' => 'pendidikan',
        'status' => 'aktif',
        'user_id' => $user->id,
    ]);

    $this->get("/isu-daerah/{$isu->id}")
        ->assertStatus(200)
        ->assertSee('Test Isu');
});

test('komisariat show page is accessible', function () {
    $komisariat = Komisariat::create([
        'nama' => 'Komisariat Test',
        'kampus' => 'Kampus Test',
        'deskripsi' => 'Deskripsi test.',
    ]);

    $this->get("/komisariat/{$komisariat->id}")
        ->assertStatus(200)
        ->assertSee('Komisariat Test');
});
