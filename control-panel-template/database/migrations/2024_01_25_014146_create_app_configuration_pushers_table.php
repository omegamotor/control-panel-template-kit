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
        Schema::create('app_configuration_pushers', function (Blueprint $table) {
            $table->id();
            $table->boolean('configuration_done')->default(false);
            $table->string('app_id');
            $table->string('app_key');
            $table->string('app_secret');
            $table->string('app_cluster');
            $table->string('host');
            $table->string('port');
            $table->string('scheme');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_configuration_pushers');
    }
};
