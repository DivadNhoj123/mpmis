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
        Schema::create('gear_licences', function (Blueprint $table) {
            $table->id();
            $table->string('owner');
            $table->string('address');
            $table->string('tax_cert_no');
            $table->date('date_issued');
            $table->string('place_issued');
            $table->longText('fishing_gear');
            $table->longText('specs')->nullable();
            $table->string('net_length')->nullable();
            $table->string('net_depth')->nullable();
            $table->string('net_mesh_size')->nullable();
            $table->string('trap_length')->nullable();
            $table->string('trap_height')->nullable();
            $table->string('trap_width')->nullable();
            $table->string('trap_mesh_size')->nullable();
            $table->string('nylon')->nullable();
            $table->string('hook_size')->nullable();
            $table->string('hook_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gear_licences');
    }
};
