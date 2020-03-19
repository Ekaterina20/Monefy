<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            //создание поля для связывания с таблицей expenses
            $table->unsignedBigInteger('income_id');
            $table->string('name');
            $table->string('icon');
            $table->text('color');
            $table->string('slug');
            $table->float('amount');
            $table->text('comment')->nullable();
            $table->timestamps();

            //создание внешнего ключа для поля 'income_id',
            // который связан с полем id таблицы 'income_sites'
            $table->foreign('income_id')
                ->references ('id')
                ->on('incomes')
                ->onDelete('cascade');//удалит дочерние записи тоже при удалении родит
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income_sites');
    }
}
