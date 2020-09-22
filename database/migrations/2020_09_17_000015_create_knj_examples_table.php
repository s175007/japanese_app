<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnjExamplesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'knj_examples';

    /**
     * Run the migrations.
     * @table knj_examples
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kanji');
            $table->string('hiragana')->nullable();
            $table->string('mean');
            $table->unsignedBigInteger('kanji_id');

            $table->index(["kanji_id"], 'fk_knj_examples_kanjis1_idx');
            $table->nullableTimestamps();


            $table->foreign('kanji_id', 'fk_knj_examples_kanjis1_idx')
                ->references('id')->on('kanjis')
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
