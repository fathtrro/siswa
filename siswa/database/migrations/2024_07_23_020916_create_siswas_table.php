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
       Schema::create('siswas', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('school_class_id')->nullable();
    $table->foreign('school_class_id')
          ->references('id')->on('school_classes')
          ->onDelete('set null');
    $table->string('name');
    $table->date('birth_date');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
