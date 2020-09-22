<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'salers';

    /**
     * Run the migrations.
     * @table salers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->date('entry_date');
            $table->string('qrcode');
            $table->date('birthday')->nullable()->default(null);
            $table->string('email');
            $table->string('password');

            $table->unique(["qrcode"], 'QRCode_UNIQUE');
            $table->nullableTimestamps();
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
