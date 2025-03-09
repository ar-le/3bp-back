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
        Schema::create('chatmessages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('mod_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->text('content');
            $table->boolean('hidden')->default(false);
            $table->boolean('censored')->default(false);
            $table->integer('complaints')->default(0);
        });

        Schema::create('chatmessage_chatroom_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('chatroom_id')->constrained()->cascadeOnDelete();
            $table->foreignId('chatmessage_id')->constrained()->cascadeOnDelete();

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatmessages');
        Schema::dropIfExists('chatmessage_chatroom_user');
    }
};
