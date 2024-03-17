<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('name_native')->nullable();
            $table->string('code')->unique();
            $table->string('flag_code');
            $table->boolean('published')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
