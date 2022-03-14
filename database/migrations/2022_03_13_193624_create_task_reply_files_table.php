<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskReplyFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_reply_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');
            $table->unsignedInteger('task_id');
            $table->unsignedInteger('task_reply_id');
            $table->timestamps();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('task_reply_id')->references('id')->on('task_replies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_reply_files');
    }
}
