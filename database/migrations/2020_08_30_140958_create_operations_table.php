<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('montant');
            $table->string('type');
            $table->string('date');
            $table->integer('compte_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('compte_id')->references('id')->on('comptes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('operations');
    }
}
