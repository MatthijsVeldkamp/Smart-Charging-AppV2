<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('smart_meters', function (Blueprint $table) {
            $table->id();
            $table->string('socket_id')->unique();
            $table->string('name');
            $table->string('status')->default('inactive');
            $table->string('ip_address')->default('81.172.179.159');
            $table->json('measurements')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('smart_meters');
    }
}; 