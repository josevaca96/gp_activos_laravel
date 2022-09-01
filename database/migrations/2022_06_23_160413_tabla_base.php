<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_activos', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string ('Nombre',120);
            $table->text('Descripcion')->nullable();
            $table->softDeletes();
        });
        Schema::create('departamentos', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string ('Nombre',120);
            $table->text('Descripcion')->nullable();
            $table->softDeletes();
        });
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string ('Nombre',120);
            $table->text('Descripcion')->nullable();
            $table->softDeletes();
        });
        Schema::create('oficinas', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->text('Direccion')->nullable();
            $table->text('Descripcion')->nullable();
            $table->softDeletes();
        });

        Schema::create('activos', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string ('Codigo',60);
            $table->bigInteger('IdTAct')->nullable();
            $table->string ('Marca',60)->nullable();
            $table->string ('Modelo',60)->nullable();
            $table->string ('NroSerial',90)->nullable();
            $table->string('Condicion',60);
            $table->text('Observaciones')->nullable();
            $table->foreign('IdTAct')->references('id')->on('tipo_activos');
            $table->softDeletes();
        });
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->bigInteger('IdActivo');
            $table->date('FechaMant');
            $table->date('FechaMantProxi')->nullable();
            $table->text('Descripcion')->nullable();
            $table->boolean('Test')->default(1);
            $table->softDeletes();
            $table->foreign('IdActivo')->references('id')->on('activos');
        });
        Schema::create('detalle_asignacions', function (Blueprint $table) {
            // $table->bigInteger('id')->unique();
            $table->bigInteger('IdE');
            $table->bigInteger('IdO');
            $table->bigInteger('IdD');
            $table->bigInteger('IdAct');
            $table->date('fecha_i');
            $table->date('fecha_f')->nullable();
            $table->string ('UsuarioAsig',60)->nullable();
            $table->string ('CapRecursos',60)->nullable();
            $table->softDeletes();
            $table->primary(['IdE','IdO','IdD','IdAct']);
            $table->foreign('IdAct')->references('id')->on('activos');
            $table->foreign('IdE')->references('id')->on('empresas');
            $table->foreign('IdO')->references('id')->on('oficinas');
            $table->foreign('IdD')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_activos');
        Schema::dropIfExists('departamentos');
        Schema::dropIfExists('empresas');
        Schema::dropIfExists('oficinas');
        Schema::dropIfExists('activos');
        Schema::dropIfExists('detalle_asignacions');
    }
}
