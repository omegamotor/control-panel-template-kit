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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'author_id')
                ->constrained('users')
                ->onUpdate('cascade');
            $table->foreignIdFor(User::class, 'receiver_id')
                ->constrained('users')
                ->onUpdate('cascade');
            $table->text('message');
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
        Schema::dropIfExists('chat_messages');
    }
};
