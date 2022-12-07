<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodolistDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todolist_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("todolist_id");
            $table->string("name");
            $table->boolean("is_done")->default(0);
            $table->timestamps();

            $table->foreign("user_id", "todolist_details_user_id_fk")->on("users")->references("id");
            $table->foreign("todolist_id", "todolist_details_todolist_id_fk")->on("todolists")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todolist_details');
    }
}
