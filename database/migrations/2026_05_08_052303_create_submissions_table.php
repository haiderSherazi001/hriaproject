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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('city');
            $table->string('whatsapp');
            $table->string('photo_path')->nullable();
            $table->string('status');
            $table->string('qualification');
            $table->string('batch');
            $table->string('job_role')->nullable();
            $table->string('company')->nullable();
            $table->text('skills');
            $table->text('achievement');
            $table->json('contributions');
            $table->string('availability');
            $table->string('seriousness');
            $table->text('suggestions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
