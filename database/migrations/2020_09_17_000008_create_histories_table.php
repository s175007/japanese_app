<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'histories';

    /**
     * Run the migrations.
     * @table histories
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('user_id');
            $table->string('sel_content')->nullable()->comment('noi dung chon hoc');

            $table->index(["user_id"], 'fk_histories_users1_idx');

            $table->index(["lesson_id"], 'fk_histories_lessons1_idx');
            $table->nullableTimestamps();


            $table->foreign('lesson_id', 'fk_histories_lessons1_idx')
                ->references('id')->on('lessons')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('user_id', 'fk_histories_users1_idx')
                ->references('id')->on('users')
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
