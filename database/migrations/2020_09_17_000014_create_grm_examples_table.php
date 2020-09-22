<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrmExamplesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'grm_examples';

    /**
     * Run the migrations.
     * @table grm_examples
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('japanese');
            $table->string('vietnamese');
            $table->unsignedBigInteger('grammar_id');

            $table->index(["grammar_id"], 'fk_grm_examples_grammars1_idx');
            $table->nullableTimestamps();


            $table->foreign('grammar_id', 'fk_grm_examples_grammars1_idx')
                ->references('id')->on('grammars')
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
