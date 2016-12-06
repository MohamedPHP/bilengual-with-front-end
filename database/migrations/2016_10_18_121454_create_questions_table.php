<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0'); // to avoid error during migration
            $table->increments('id');
            $table->text('content');
            $table->integer('Questiontype')->default(0);
            $table->integer('round_id')->unsigned();
            $table->foreign('round_id')->references('id')->on('rounds')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); // to avoid error during migration
        Schema::drop('questions');
    }
}
