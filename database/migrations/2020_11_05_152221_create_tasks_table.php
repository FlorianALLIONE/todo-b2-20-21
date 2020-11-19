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
            $table->string('title');
            $table->text('description');
            $table->date('due_date');
            $table->enum('state', ['todo', 'ongoing', 'done'])->default("todo");
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('board_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            // $table->BigInteger('category_id')->unsigned()->index();
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            // $table->BigInteger('board_id')->unsigned()->index();
            // $table->foreign('board_id')->references('id')->on('boards')->onDelete('cascade')->onUpdate('cascade');
            
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
}
