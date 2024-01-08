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
        Schema::create('app_configuration_emails', function (Blueprint $table) {
            $table->id();
            $table->boolean('configuration_done');
            $table->boolean('active_sending');
            $table->string('mailer');
            $table->string('host');
            $table->integer('port');
            $table->string('username');
            $table->string('password');
            $table->string('encryption');
            $table->string('from_address');
            $table->string('from_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_configuration_emails');
    }
};
