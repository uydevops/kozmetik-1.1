<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\News;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment('Haber Başlığı');
            $table->string('description', 160)->comment('Haber Açıklaması');
            $table->string('keywords', 160)->comment('Anahtar Kelimeler');
            $table->text('content')->comment('Haber İçeriği');
            $table->string('image', 255)->comment('Haber Resmi');
            $table->string('slug', 255)->comment('SEO Dostu URL');
            $table->enum('status', ['passive', 'active'])->default('passive')->comment('Haber Durumu (Pasif/Active)');
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
