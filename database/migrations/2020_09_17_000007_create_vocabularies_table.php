<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVocabulariesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'vocabularies';

    /**
     * Run the migrations.
     * @table vocabularies
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kanji')->nullable()->default(null);
            $table->string('hiragana')->nullable()->default(null);
            $table->string('mean');
            $table->unsignedBigInteger('lesson_id')->nullable()->default(null);

            $table->index(["lesson_id"], 'fk_vocabularies_lessons1_idx');
            $table->nullableTimestamps();


            $table->foreign('lesson_id', 'fk_vocabularies_lessons1_idx')
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
