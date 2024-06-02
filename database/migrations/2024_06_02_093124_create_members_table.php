<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('members', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('gender')->nullable();
        $table->date('join_date')->nullable();
        $table->integer('age')->nullable();
        $table->unsignedBigInteger('membership_id')->nullable();
        $table->timestamps();

        $table->foreign('membership_id')->references('id')->on('memberships');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
