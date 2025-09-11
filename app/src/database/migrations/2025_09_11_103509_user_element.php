<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_elements', function (Blueprint $table) {
            $table->id();
            $table->integer('stage_id');
            $table->integer('x');
            $table->integer('y');
            $table->integer('type'); // 1~4で向き、0ならゴールの元素
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
