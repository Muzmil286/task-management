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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('project_id')->references('id')->on('projects')->cascadeOnDelete();
            $table->timestamp('assign_date');
            $table->timestamp('due_date')->nullable();
            $table->enum('porirty' , ['low' , 'high' , 'mid'])->default('low');
            $table->enum('status' , ['open' , 'progress' , 'completed']);
            $table->text('work_description')->nullable();
            $table->timestamp('done_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
