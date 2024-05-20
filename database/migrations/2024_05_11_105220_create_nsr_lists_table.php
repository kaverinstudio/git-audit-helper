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
        Schema::create('nsr_lists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('audit_data_id')->constrained('audit_data')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->text('non_conformity')->nullable(true);
            $table->string('non_conformity_photo')->nullable(true);
            $table->text('respondent_comments')->nullable(true);
            $table->string('respondent_comments_photo')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nsr_lists');
    }
};
