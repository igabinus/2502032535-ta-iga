<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('NOTIFICATIONS', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('USERS')->onDelete('cascade');
            $table->unsignedBigInteger('task_id')->nullable();
            $table->foreign('task_id')->references('id')->on('TASKS')->onDelete('set null');
            $table->string('link')->nullable();
            $table->boolean('hasRead')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('NOTIFICATIONS');
    }
};
