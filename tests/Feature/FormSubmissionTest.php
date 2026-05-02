<?php

use App\Models\DaurahMarhalah;
use App\Models\Kontak;
use App\Models\PendaftaranDm;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('contact form can be submitted', function () {
    $response = $this->post('/kontak', [
        'nama' => 'Test User',
        'email' => 'test@example.com',
        'no_hp' => '08123456789',
        'subjek' => 'Tanya Sesuatu',
        'pesan' => 'Ini adalah pesan test.',
    ]);

    $this->assertDatabaseHas('kontaks', [
        'nama' => 'Test User',
        'email' => 'test@example.com',
    ]);

    $response->assertRedirect();
    $this->assertTrue(str_contains($response->headers->get('Location'), 'https://wa.me/'));
});

test('BKM registration can be submitted', function () {
    $response = $this->post('/bkm/daftar', [
        'nama' => 'BKM Candidate',
        'email' => 'bkm@example.com',
        'no_hp' => '08123456789',
        'kampus' => 'Universitas Siliwangi',
        'komisariat' => 'UNSIL',
        'pesan' => 'Saya ingin bergabung.',
    ]);

    $this->assertDatabaseHas('kontaks', [
        'nama' => 'BKM Candidate',
        'email' => 'bkm@example.com',
        'subjek' => 'Pendaftaran BKM — Universitas Siliwangi',
    ]);

    $response->assertSessionHas('success');
});

test('kaderisasi registration can be submitted', function () {
    $daurah = DaurahMarhalah::create([
        'nama' => 'Daurah Marhalah 1 Test',
        'level' => 'DM1',
        'tanggal_mulai' => now()->addDays(7),
        'tanggal_selesai' => now()->addDays(10),
        'lokasi' => 'Kampus A',
        'kuota' => 50,
        'biaya' => 50000,
        'status' => 'akan_datang',
    ]);

    $response = $this->post("/kaderisasi/{$daurah->slug}-{$daurah->token}/daftar", [
        'nama_lengkap' => 'Kader Baru',
        'nim' => '123456',
        'email' => 'kader@example.com',
        'no_hp' => '08123456789',
        'komisariat' => 'UNSIL',
        'kampus' => 'Universitas Siliwangi',
        'jenis_kelamin' => 'ikhwan',
    ]);

    $this->assertDatabaseHas('pendaftaran_dms', [
        'nama_lengkap' => 'Kader Baru',
        'email' => 'kader@example.com',
        'daurah_marhalah_id' => $daurah->id,
    ]);

    $response->assertRedirect(route('kaderisasi.index'));
    $response->assertSessionHas('success');
});

test('DM2 registration requires DM1 graduation', function () {
    $daurah = DaurahMarhalah::create([
        'nama' => 'Daurah Marhalah 2 Test',
        'level' => 'DM2',
        'tanggal_mulai' => now()->addDays(7),
        'tanggal_selesai' => now()->addDays(10),
        'lokasi' => 'Kampus B',
        'kuota' => 30,
        'biaya' => 75000,
        'status' => 'akan_datang',
    ]);

    $response = $this->from("/kaderisasi/{$daurah->slug}-{$daurah->token}/daftar")->post("/kaderisasi/{$daurah->slug}-{$daurah->token}/daftar", [
        'nama_lengkap' => 'Kader DM2',
        'nim' => '1234567',
        'email' => 'dm2candidate@example.com',
        'no_hp' => '08123456789',
        'komisariat' => 'UNSIL',
        'kampus' => 'Universitas Siliwangi',
        'jenis_kelamin' => 'ikhwan',
    ]);

    $response->assertRedirect("/kaderisasi/{$daurah->slug}-{$daurah->token}/daftar");
    $response->assertSessionHasErrors(['email']);
});
