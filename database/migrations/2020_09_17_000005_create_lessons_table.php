<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'lessons';

    /**
     * Run the migrations.
     * @table lessons
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('img')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('book_id');

            $table->index(["book_id"], 'fk_lessons_books1_idx');
            $table->nullableTimestamps();


            $table->foreign('book_id', 'fk_lessons_books1_idx')
                ->references('id')->on('books')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
