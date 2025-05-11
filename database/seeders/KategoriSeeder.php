<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            [
                'name' => 'Ekbis Jambi',
            ],
            [
                'name' => 'Peluang Usaha',
            ],
            [
                'name' => 'Perbankan',
            ],
            [
                'name' => 'Properti',
            ],
            [
                'name' => 'Nasional',
            ],
            [
                'name' => 'Internasional',
            ],
            [
                'name' => 'Kuliner',
            ],
            [
                'name' => 'Otobiz',
            ],
        ];

        foreach ($kategoris as $kategori) {
            \App\Models\Categorie::updateOrCreate($kategori);
        }
    }
}
