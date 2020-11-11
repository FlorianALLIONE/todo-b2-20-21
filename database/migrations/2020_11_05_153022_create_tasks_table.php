<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
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
            $table->string('title', 30);
            $table->text('description');
            $table->date('due_date');
            $table->enum('state', ['todo', 'ongoing', 'done']);
            $table->timestamps();

            // Import Foreign Key
            $table->foreignId('category_id')->unique()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('board_id')->unique()->constrained()->onDelete('cascade')->onUpdate('cascade');
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
}
