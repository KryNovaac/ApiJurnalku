<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
{
    // 1. M. Reysha Nova A
    $user1 = \App\Models\User::create([
        'name'     => 'M. Reysha Nova A',
        'nis'      => '12309727',
        'password' => \Illuminate\Support\Facades\Hash::make('12309727'),
        'photo'    => 'none',
        'rombel'   => 'pplg-xii5',
        'rayon'    => 'cicurug-9',
    ]);
    
    // Tambah Sosmed (Platform sudah string, jadi bebas isi)
    $user1->socialLinks()->create(['platform' => 'Instagram', 'url' => 'https://ig.com/reysha']);
    $user1->socialLinks()->create(['platform' => 'GitHub', 'url' => 'https://github.com/reysha']);

    // Tambah Portfolio (Image boleh null)
    $user1->portfolios()->create([
        'title'       => 'Sistem Jurnal PKL',
        'description' => 'Aplikasi untuk mencatat kegiatan harian PKL',
        'duration'    => '2 bulan',
        'image'       => null // Contoh nullable
    ]);

    // 2. dummy1
    \App\Models\User::create([
        'name'     => 'dummy1',
        'nis'      => '12309999',
        'password' => \Illuminate\Support\Facades\Hash::make('12309999'),
        'photo'    => 'none',
        'rombel'   => 'pplg-xii3',
        'rayon'    => 'cicurug-7',
    ]);

    // 3. Pentol Kuda (fadel)
    \App\Models\User::create([
        'name'     => 'Pentol Kuda (fadel)',
        'nis'      => '12309627',
        'password' => \Illuminate\Support\Facades\Hash::make('12309627'),
        'photo'    => 'none',
        'rombel'   => 'pplg-xii5',
        'rayon'    => 'cicurug-10',
    ]);
}
}