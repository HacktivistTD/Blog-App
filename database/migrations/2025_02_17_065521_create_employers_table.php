<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->decimal('basic_salary', 10, 2);
            $table->decimal('ot_salary', 10, 2)->nullable();
            $table->decimal('total_salary', 10, 2)->storedAs('basic_salary + COALESCE(ot_salary, 0)');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
