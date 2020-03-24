<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('amount');
            $table->string('comment')->nullable();
            $table->date('date');
            $table->timestamps();

            //создание поля для связывания с таблицей categories, users
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');

            //создание внешнего ключа для поля 'category_id',
            // который связан с полем id таблицы 'finances'
            $table->foreign('category_id')
                ->references ('id')
                ->on('categories')
                ->onDelete('cascade');//удалит дочерние записи тоже при удалении родит

            //для таблицы users

            $table->foreign('user_id')
                ->references ('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finances');
    }
}
