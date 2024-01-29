<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adsense_codes', function (Blueprint $table) {
            $table->id();
            $table->text('code'); // Reklam kodunu saklamak için text tipi kullanılabilir.
            $table->unsignedBigInteger('user_id'); // User'ın kimliğini saklamak için.
            $table->timestamps();

            // Foreign key ilişkisi tanımlanıyor.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adsense_codes');
    }
};
