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
        Schema::create('non_boat_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('owner');
            $table->string('address');
            $table->string('registration_no')->unique();
            $table->string('fisherfolk_id');
            $table->string('remarks');
            $table->timestamp('date_registered')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_boat_registrations');
    }
};
