<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'books';

    /**
     * Run the migrations.
     * @table books
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('img')->nullable()->default(null);
            $table->unsignedBigInteger('category_id');

            $table->index(["category_id"], 'fk_books_categories1_idx');
            $table->nullableTimestamps();


            $table->foreign('category_id', 'fk_books_categories1_idx')
                ->references('id')->on('categories')
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
        // Schema::dropIndex('fk_books_categories1_idx');
        // Schema::dropForeign('fk_books_categories1_idx');
        Schema::dropIfExists($this->tableName);
    }
}
