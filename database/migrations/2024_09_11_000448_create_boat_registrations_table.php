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
        Schema::create('boat_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('owner');
            $table->string('address');
            $table->string('registration_no')->unique();
            $table->integer('fisherfolk_id');
            $table->string('name_of_boat')->nullable();
            $table->string('engine');
            $table->string('engine_serial')->nullable();
            $table->string('hp');
            $table->string('color');
            $table->string('tonnage');
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
        Schema::dropIfExists('boat_registrations');
    }
};
