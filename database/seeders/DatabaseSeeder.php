<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Member;
use App\Models\Product;
use App\Models\User;
use Illuminate\Console\View\Components\Secret;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'id' => 1,
            'name' => 'Administrator',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('123'),
            'level' => 'Admin'
        ]);

        User :: create([
            'id' => 2,
            'name' => 'Rahman',
            'email' => 'sajidan@gmail.com',
            'password' => bcrypt('sajidan'),
            'level' => 'Member'
        ]);

        Member :: create([
            'id' => 1,
            'name' => 'Rahman',
            'no_hp' => '0857465738475',
            'address' => 'Salawu',
            'foto' => 'a',
            'users_id' => 1,
        ]);

        Member :: create([
            'id' => 2,
            'name' => 'Rahman N',
            'no_hp' => '085764367589',
            'address' => 'Salawu',
            'foto' => 'a',
            'users_id' => 2,
        ]);

        Categorie :: create([
            'id' => 1,
            'name' => 'Makanan Goreng',
        ]);

        Categorie :: create([
            'id' => 2,
            'name' => 'Makanan Rebus',
        ]);

        Categorie :: create([
            'id' => 3,
            'name' => 'Makanan Panggang',
        ]);

        Product :: create([
            'id' => 1,
            'name' => 'Ayam Goreng',
            'price' => 25000,
            'descriptions' => 'Ayam goreng adalah salah satu hidangan populer yang terbuat dari potongan ayam yang dibumbui dengan berbagai rempah dan bahan, lalu digoreng hingga matang dan berwarna keemasan. Proses penggorengan memberikan ayam tekstur luar yang renyah, sementara bagian dalamnya tetap juicy dan lembut. Ayam goreng bisa disajikan dengan berbagai jenis sambal atau pelengkap seperti nasi, lalapan, atau acar.',
            'image' => 'ayam-goreng.jpg',
            'categories_id' => 1,
        ]);

        Product :: create([
            'id' => 2,
            'name' => 'Sayur Asem',
            'price' => 20000,
            'descriptions' => 'Sayur asem adalah salah satu hidangan tradisional khas Indonesia yang terkenal dengan rasa segar dan sedikit asam. Kuahnya yang bening terbuat dari campuran bumbu seperti asam jawa, bawang merah, bawang putih, cabai, lengkuas, dan daun salam.',
            'image' => 'sayur-asem.webp',
            'categories_id' => 2,
        ]);

        Product::create([
            'id' => 3,
            'name' => 'Ayam Panggang',
            'price' => 25000,
            'image' => 'ayam-panggang.jpg',
            'descriptions' => 'Ayam panggang adalah hidangan yang dibuat dengan cara memanggang ayam hingga matang sempurna, menghasilkan tekstur yang juicy di dalam dan renyah di luar. Hidangan ini biasanya dibumbui dengan campuran rempah-rempah seperti bawang putih, bawang merah, kunyit, jahe, ketumbar, kecap, atau madu, tergantung pada variasi resepnya. Ayam panggang memiliki rasa yang kaya dan aroma khas dari proses pemanggangan.',
            'categories_id' => 3,
        ]);

        Product :: create([
            'id' => 4,
            'name' => 'Ayam Panggang',
            'price' => 25000,
            'image' => 'ayam-panggang.jpg',
            'descriptions' => 'Ayam panggang adalah hidangan yang dibuat dengan cara memanggang ayam hingga matang sempurna, menghasilkan tekstur yang juicy di dalam dan renyah di luar. Hidangan ini biasanya dibumbui dengan campuran rempah-rempah seperti bawang putih, bawang merah, kunyit, jahe, ketumbar, kecap, atau madu, tergantung pada variasi resepnya. Ayam panggang memiliki rasa yang kaya dan aroma khas dari proses pemanggangan.',
            'categories_id' => 3,
        ]);

        Product :: create([
            'id' =>5,
            'name' => 'Ayam Panggang',
            'price' => 25000,
            'image' => 'ayam-panggang.jpg',
            'descriptions' => 'Ayam panggang adalah hidangan yang dibuat dengan cara memanggang ayam hingga matang sempurna, menghasilkan tekstur yang juicy di dalam dan renyah di luar. Hidangan ini biasanya dibumbui dengan campuran rempah-rempah seperti bawang putih, bawang merah, kunyit, jahe, ketumbar, kecap, atau madu, tergantung pada variasi resepnya. Ayam panggang memiliki rasa yang kaya dan aroma khas dari proses pemanggangan.',
            'categories_id' => 3,
        ]);

        Product :: create([
            'id' =>6,
            'name' => 'Ayam Panggang',
            'price' => 25000,
            'image' => 'ayam-panggang.jpg',
            'descriptions' => 'Ayam panggang adalah hidangan yang dibuat dengan cara memanggang ayam hingga matang sempurna, menghasilkan tekstur yang juicy di dalam dan renyah di luar. Hidangan ini biasanya dibumbui dengan campuran rempah-rempah seperti bawang putih, bawang merah, kunyit, jahe, ketumbar, kecap, atau madu, tergantung pada variasi resepnya. Ayam panggang memiliki rasa yang kaya dan aroma khas dari proses pemanggangan.',
            'categories_id' => 3,
        ]);

        Product::create([
            'id' => 7,
            'name' => 'Ayam Panggang',
            'price' => 25000,
            'image' => 'ayam-panggang.jpg',
            'descriptions' => 'Ayam panggang adalah hidangan yang dibuat dengan cara memanggang ayam hingga matang sempurna, menghasilkan tekstur yang juicy di dalam dan renyah di luar. Hidangan ini biasanya dibumbui dengan campuran rempah-rempah seperti bawang putih, bawang merah, kunyit, jahe, ketumbar, kecap, atau madu, tergantung pada variasi resepnya. Ayam panggang memiliki rasa yang kaya dan aroma khas dari proses pemanggangan.',
            'categories_id' => 3,
        ]);

        Product::create([
            'id' => 8,
            'name' => 'Ayam Panggang',
            'price' => 25000,
            'image' => 'ayam-panggang.jpg',
            'descriptions' => 'Ayam panggang adalah hidangan yang dibuat dengan cara memanggang ayam hingga matang sempurna, menghasilkan tekstur yang juicy di dalam dan renyah di luar. Hidangan ini biasanya dibumbui dengan campuran rempah-rempah seperti bawang putih, bawang merah, kunyit, jahe, ketumbar, kecap, atau madu, tergantung pada variasi resepnya. Ayam panggang memiliki rasa yang kaya dan aroma khas dari proses pemanggangan.',
            'categories_id' => 3,
        ]);
    }
}
