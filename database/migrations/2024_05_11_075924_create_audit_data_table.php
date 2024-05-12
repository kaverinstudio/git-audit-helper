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
        Schema::create('audit_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('audit_id')->constrained('audits')->cascadeOnDelete();
            $table->text('paragraph_qap')->nullable(true);
            $table->text('questions')->nullable(true);
            $table->text('requirements')->nullable(true);
            $table->text('respondent_comments')->nullable(true);
            $table->text('auditor_comments')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_data');
    }
};
