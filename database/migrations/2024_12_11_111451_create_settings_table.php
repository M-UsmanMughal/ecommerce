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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('logo')->default(null);
            $table->string('phone');
            $table->string('email');
            $table->string('github_link');
            $table->string('linkedin_link');
            $table->string('about_photo_1')->default(null);
            $table->string('about_photo_2')->default(null);
            $table->string('address');
            $table->text('about_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
