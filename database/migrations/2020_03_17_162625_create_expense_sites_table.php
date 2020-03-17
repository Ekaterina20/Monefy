<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            //создание поля для связывания с таблицей expenses
            $table->unsignedBigInteger('expense_id');
            $table->string('name');
            $table->string('icon');
            $table->text('color');
            $table->string('slug');
            $table->float('amount');
            $table->text('comment')->nullable();
            $table->timestamps();

            //создание внешнего ключа для поля 'expenses_id',
            // который связан с полем id таблицы 'expense_sites'
            $table->foreign('expense_id')
                ->references ('id')
                ->on('expenses')
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
        Schema::dropIfExists('expense_sites');
    }
}
