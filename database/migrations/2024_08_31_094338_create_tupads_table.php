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
        Schema::create('tupads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('initial')->nullable();
            $table->string('surname');
            $table->string('suffix')->nullable();
            $table->string('barangay');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tupads');
    }
};
