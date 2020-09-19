<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('del_flg')->nullable()->default('0');
            $table->integer('saler_id')->nullable()->default(null);

            $table->index(["saler_id"], 'fk_users_salers_idx');

            $table->unique(["email"], 'users_email_unique');
            $table->nullableTimestamps();


            $table->foreign('saler_id', 'fk_users_salers_idx')
                ->references('id')->on('salers')
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
