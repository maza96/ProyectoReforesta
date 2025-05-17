<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('nick')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('karma')->default(0);
            $table->string('avatar')->nullable();
            $table->timestamps();
        });

        Schema::create("eventos", function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->date("fecha");
            $table->string("ubicacion");
            $table->string("tipo_evento");
            $table->string("tipo_terreno");
            $table->text("descripcion");
            $table->string("archivo")->nullable();
            $table->foreignId("anfitrion_id")->constrained("usuarios");
            $table->timestamps();
        });

        Schema::create("especies", function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cientifico')->unique(); 
            $table->text('descripcion')->nullable();
            $table->string('clima'); 
            $table->string('region'); 
            $table->integer('tiempo_adulto');
            $table->string('foto')->nullable();
            $table->string('enlace')->nullable();
            $table->timestamps();
        });

        Schema::create('beneficios', function (Blueprint $table) {
            $table->foreignId('especie_id')->constrained('especies')->onDelete('cascade');
            $table->unsignedBigInteger('beneficio_id');
            $table->string('descripcion');
            $table->primary(['especie_id', 'beneficio_id']);
        });
        

        Schema::create("especie_evento", function (Blueprint $table) {
            $table->bigInteger("cantidad");
            $table->primary(["evento_id", "especie_id"]);
            $table->foreignId("evento_id")->constrained("eventos")->onDelete("cascade");
            $table->foreignId("especie_id")->constrained("especies")->onDelete("cascade");
        });

        Schema::create("evento_usuario", function (Blueprint $table) {
            $table->foreignId("usuario_id")->constrained("usuarios")->onDelete("cascade");
            $table->foreignId("evento_id")->constrained("eventos")->onDelete("cascade");
            $table->primary(["usuario_id", "evento_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("evento_usuario");
        Schema::dropIfExists("especie_evento");
        Schema::dropIfExists("eventos");
        Schema::dropIfExists("especies");
        Schema::dropIfExists("usuarios");
    }
};
