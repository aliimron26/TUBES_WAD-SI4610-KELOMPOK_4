<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Dari Medan Perang Hingga Red Carpet: Sejarah Menarik Sepatu High Heels',
                'content' => 'Sepatu high heels, simbol femininitas dan keanggunan, memiliki sejarah panjang yang dimulai di Persia kuno sebagai alat untuk menunggang kuda, sebelum menjadi simbol status di Eropa pada abad ke-16, terutama di kalangan bangsawan...',
                'image' => 'articles/high-heels-history.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Fashion Berkelanjutan: Mengapa Penting untuk Masa Depan Kita',
                'content' => 'Fashion berkelanjutan, yang semakin penting di era modern ini, merujuk pada praktik dalam industri fashion yang bertujuan mengurangi dampak negatif terhadap lingkungan dan masyarakat...',
                'image' => 'articles/sustainable-fashion.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
