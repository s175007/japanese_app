<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'conversations';

    /**
     * Run the migrations.
     * @table conversations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->string('actor', 45);
            $table->string('gender', 45);
            $table->integer('order_no');
            $table->unsignedBigInteger('lesson_id');

            $table->index(["lesson_id"], 'fk_sentences_lessons1_idx');
            $table->nullableTimestamps();


            $table->foreign('lesson_id', 'fk_sentences_lessons1_idx')
                ->references('id')->on('lessons')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
