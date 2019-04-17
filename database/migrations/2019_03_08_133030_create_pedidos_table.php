<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dni_cliente',8);
            $table->foreign('dni_cliente')->references('dni')->on('clientes');
            $table->string('dni_user',8);
            $table->foreign('dni_user')->references('dni')->on('users');
            $table->float('price');
            $table->date('date');
            $table->boolean('is_deliver')->nullable();
            $table->json('id_comidas');
            $id_comida = DB::connection()->getQueryGrammar()->wrap('id_comidas->id_comida');
            $table->unsignedBigInteger('id_comida')->storedAs($id_comida);
            $table->foreign('id_comida')->references('id')->on('comidas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
        Schema::dropForeign(['dni_cliente']);
        Schema::dropForeign(['dni_user']);
    }
}
