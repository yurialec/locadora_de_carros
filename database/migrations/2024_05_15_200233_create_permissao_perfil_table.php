<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissaoPerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao_perfil', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('permissao_id')->unsigned()->index()->nullable();
            $table->foreign('permissao_id')->references('id')->on('permissao')->onDelete('cascade');
            $table->bigInteger('perfil_id')->unsigned()->index()->nullable();
            $table->foreign('perfil_id')->references('id')->on('perfil')->onDelete('cascade');
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
        Schema::dropIfExists('permissao_perfil');
    }
}
