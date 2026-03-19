<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProfilOrganisasi; // Import Model ProfilOrganisasi

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat User Admin contoh (jika belum ada)
        User::updateOrCreate(
            ['email' => 'admin@kammitasik.org'],
            [
                'name'     => 'Admin KAMMI Tasikmalaya',
                'password' => bcrypt('password'), // Ganti dengan password yang aman jika sudah deploy
                'role'     => 'super_admin',
                'email_verified_at' => now(),
            ]
        );
        User::updateOrCreate(
            ['email' => 'member@kammitasik.org'],
            [
                'name'     => 'Anggota KAMMI',
                'password' => bcrypt('password'),
                'role'     => 'member',
                'email_verified_at' => now(),
            ]
        );

        // Seed data untuk ProfilOrganisasi
        ProfilOrganisasi::create(['kunci' => 'sejarah', 'konten' => '
            <h1>Sejarah Singkat KAMMI Daerah Tasikmalaya</h1>
            <p>KAMMI Daerah Tasikmalaya didirikan pada tanggal [Tanggal Pendirian] sebagai wujud kepedulian mahasiswa muslim terhadap dinamika pergerakan mahasiswa dan isu-isu keumatan di wilayah Tasikmalaya dan sekitarnya...</p>
            <p>Sejak awal pendiriannya, KAMMI Tasikmalaya telah berkomitmen untuk menjadi garda terdepan dalam...</p>
        ']);

        ProfilOrganisasi::create(['kunci' => 'visi_misi', 'konten' => '
            <h2>Visi</h2>
            <p>Menjadi organisasi mahasiswa pergerakan yang profesional, intelektual, danIslami, serta mampu memberikan kontribusi positif bagi masyarakat.</p>
            <h2>Misi</h2>
            <ol>
                <li>Meningkatkan kualitas kaderisasi dan intelektualitas anggota.</li>
                <li>Melakukan advokasi kebijakan publik yang berpihak pada rakyat.</li>
                <li>Membangun kemitraan strategis dengan berbagai elemen masyarakat.</li>
                <li>Memperkuat peran mahasiswa muslim dalam pembangunan daerah.</li>
            </ol>
        ']);

        ProfilOrganisasi::create(['kunci' => 'mars', 'konten' => '
            <h2>Mars KAMMI</h2>
            <p>Tahan, Dengar, Panggil Kami!<br>
            Demi Allah, Keadilan, Umat dan Negeri!<br>
            KAMMI... KAMMI... KAMMI!<br>
            <em>(Lanjutkan lirik Mars KAMMI di sini)</em></p>
        ']);

        ProfilOrganisasi::create(['kunci' => 'hymne', 'konten' => '
            <h2>Hymne KAMMI</h2>
            <p>Wahai Putra Putri Muslim Indonesia<br>
            Bangkitlah Teguh Bersatu Padu<br>
            MajuLLA...</p>
            <p><em>(Lanjutkan lirik Hymne KAMMI di sini)</em></p>
        ']);
    }
}
