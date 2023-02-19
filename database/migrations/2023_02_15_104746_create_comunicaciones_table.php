<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dirigido_id');
            $table->integer('via_id');
            $table->integer('de_id');
            $table->integer('document_id')->nullable();
            $table->integer('hojaderuta_id')->nullable();
            $table->string('code')->nullable();
            $table->text('referencia')->nullable();
            $table->text('nota')->nullable();
            $table->date('fecha');
            $table->time('hora', 0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunicaciones');
    }
}
