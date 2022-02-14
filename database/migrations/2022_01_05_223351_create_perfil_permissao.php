<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilPermissao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_permissao', function (Blueprint $table) {
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('permissao_id');

            $table->foreign('perfil_id')->references('id')->on('perfil')->onDelete('cascade');
            $table->foreign('permissao_id')->references('id')->on('permissao')->onDelete('cascade');

            $table->primary(['perfil_id','permissao_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('perfil_permissao',function(Blueprint $table){
            $table->foreign('perfil_id_foreign');
            $table->foreign('permissao_id_foreign');
        });
        Schema::dropIfExists('perfil_permissao');
    }
}
