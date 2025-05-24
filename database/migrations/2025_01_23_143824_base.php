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

         Schema::create('users', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincrementable
            $table->string('first_name'); // Nombre
            $table->string('last_name')->nullable(); // Apellido (puede ser nulo)
            $table->string('email')->unique(); // Email único
            $table->string('password'); // Contraseña (ya está hasheada)
            $table->enum('role', ['admin', 'user']); // Rol (admin o user)
            $table->rememberToken(); // Para recordar la sesión del usuario
            $table->timestamps(); // Fechas de creación y actualización
        });
        Schema::create('userEntity', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('isActive')->default(true);
            $table->string('rol')->default('user');
            $table->string('password');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Department', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Civil_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('State', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Municipalities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Parishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Charge', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Type_creations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('id_carnet')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Textures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Skin_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Genders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Hair_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Access_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');
        });

        Schema::create('Carnets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('identifier')->default('V');
            $table->string('card_code')->nullable();
            $table->timestamp('expiration')->nullable();
            $table->text('note')->nullable();
            
            $table->string('cedule')->nullable();
            $table->text('address')->nullable();
            $table->string('cellpone')->nullable();
            $table->unsignedBigInteger('id_department')->nullable();
            $table->unsignedBigInteger('id_charge')->nullable();
            $table->unsignedBigInteger('id_status')->nullable();
            $table->unsignedBigInteger('id_access_levels')->nullable();
            $table->unsignedBigInteger('id_state')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->onUpdate('current_timestamp');

            $table->foreign('id_department')->references('id')->on('Department');
            $table->foreign('id_charge')->references('id')->on('Charge');
            $table->foreign('id_status')->references('id')->on('Status');
            $table->foreign('id_access_levels')->references('id')->on('Access_levels');
            $table->foreign('id_state')->references('id')->on('State');
        });

        Schema::table('Type_creations', function (Blueprint $table) {
            $table->foreign('id_carnet')->references('id')->on('Carnets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('userEntity');
        Schema::dropIfExists('Department');
        Schema::dropIfExists('Civil_statuses');
        Schema::dropIfExists('State');
        Schema::dropIfExists('Municipalities');
        Schema::dropIfExists('Parishes');
        Schema::dropIfExists('Charge');
        Schema::dropIfExists('Type_creations');
        Schema::dropIfExists('Textures');
        Schema::dropIfExists('Status');
        Schema::dropIfExists('Skin_colors');
        Schema::dropIfExists('Genders');
        Schema::dropIfExists('Hair_colors');
        Schema::dropIfExists('Access_levels');
        Schema::dropIfExists('Carnets');
    }
};
