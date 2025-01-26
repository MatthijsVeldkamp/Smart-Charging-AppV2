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
        Schema::create('charge_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('socket_id');
            $table->string('user_id');
            $table->timestamp('time_begin')->nullable();
            $table->timestamp('time_end')->nullable(); 
            $table->decimal('total_energy_on_start', 8, 4)->default(0)->nullable();
            $table->decimal('total_energy_on_end', 8, 4)->default(0)->nullable();
            $table->decimal('used_energy_total', 8, 4)->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charge_sessions');
    }
};
