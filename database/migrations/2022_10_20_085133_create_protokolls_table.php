<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protokolls', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignid('user_id')->constrained()->cascadeOnDelete();
            $table->foreignid('role_id')->constrained()->cascadeOnDelete();;
            $table->foreignid('event_id')->constrained()->cascadeOnDelete();;
            $table->text('action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protokolls');
    }
};
