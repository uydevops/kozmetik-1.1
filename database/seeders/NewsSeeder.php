<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{

    public function run(): void
    {

        $News = [
            'title' => 'Sahte Haber Başlığı',
            'description' => 'Sahte Haber Açıklaması',
            'keywords' => 'Sahte Haber Anahtar Kelimeler',
            'content' => 'Sahte Haber İçeriği',
            'image' => 'https://via.placeholder.com/640x480.png/00ff77?text=Sahte+Haber+Resmi',
            'slug' => 'sahte-haber-basligi',
            'status' => 'active',
        ];
        News::create($News);
    }
}
