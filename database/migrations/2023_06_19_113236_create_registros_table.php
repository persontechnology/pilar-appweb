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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('ubicacion_id')->constrained('ubicacions');
            $table->decimal('troza',15,2)->nullable()->default(0);
            $table->decimal('carga',15,2)->nullable()->default(0);
            $table->decimal('promedio',15,2)->nullable()->default(0);
            $table->decimal('metros',15,2)->nullable()->default(0);
            $table->decimal('factor',15,2)->nullable()->default(0);
            $table->integer('numero')->nullable()->default(0);
            $table->decimal('altura_a_1',15,2)->nullable()->default(0);
            $table->decimal('altura_a_2',15,2)->nullable()->default(0);
            $table->decimal('altura_a_3',15,2)->nullable()->default(0);
            $table->decimal('altura_a_4',15,2)->nullable()->default(0);
            $table->decimal('altura_a_5',15,2)->nullable()->default(0);
            $table->decimal('altura_a_6',15,2)->nullable()->default(0);
            $table->decimal('altura_a_7',15,2)->nullable()->default(0);
            $table->decimal('altura_b_1',15,2)->nullable()->default(0);
            $table->decimal('altura_b_2',15,2)->nullable()->default(0);
            $table->decimal('altura_b_3',15,2)->nullable()->default(0);
            $table->decimal('altura_b_4',15,2)->nullable()->default(0);
            $table->decimal('altura_b_5',15,2)->nullable()->default(0);
            $table->decimal('altura_b_6',15,2)->nullable()->default(0);
            $table->decimal('altura_b_7',15,2)->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
