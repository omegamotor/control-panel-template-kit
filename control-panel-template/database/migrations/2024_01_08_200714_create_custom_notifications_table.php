<?php

use App\Models\User;
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
        Schema::create('custom_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('message', 255);
            $table->string('type');

            $table->foreignIdFor(User::class, 'author_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade');

            $table->foreignIdFor(User::class, 'user_id')
                ->constrained('users')
                ->onUpdate('cascade');

            $table->boolean('is_readed')
                ->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_notifications');
    }
};
