<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'exercises';

    /**
     * Run the migrations.
     * @table exercises
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable()->default(null);
            $table->unsignedBigInteger('lesson_id')->nullable()->default(null);

            $table->index(["lesson_id"], 'fk_exercises_lessons1_idx');
            $table->nullableTimestamps();


            $table->foreign('lesson_id', 'fk_exercises_lessons1_idx')
                ->references('id')->on('lessons')
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
