<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVcbExamplesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'vcb_examples';

    /**
     * Run the migrations.
     * @table vcb_examples
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vocabulary_id');
            $table->text('examples')->nullable();

            $table->index(["vocabulary_id"], 'fk_examples_vocabularies1_idx');
            $table->nullableTimestamps();


            $table->foreign('vocabulary_id', 'fk_examples_vocabularies1_idx')
                ->references('id')->on('vocabularies')
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
