<?php

use App\Enums\GameState;
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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('state')->default(GameState::GAME_STATE_INITIALISED->value);
            $table->integer('difficulty')->default(\App\Enums\DifficultyCoefficient::NOVICE->value);
            $table->unsignedBigInteger('player_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
