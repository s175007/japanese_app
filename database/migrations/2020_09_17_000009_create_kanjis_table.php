<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanjisTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'kanjis';

    /**
     * Run the migrations.
     * @table kanjis
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img');
            $table->string('kanji', 45)->nullable();
            $table->string('onyomi');
            $table->string('kunyomi');
            $table->string('hanviet');
            $table->text('description')->nullable()->default(null);
            $table->unsignedBigInteger('lesson_id')->nullable()->default(null);

            $table->index(["lesson_id"], 'fk_kanjis_lessons1_idx');
            $table->nullableTimestamps();


            $table->foreign('lesson_id', 'fk_kanjis_lessons1_idx')
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
