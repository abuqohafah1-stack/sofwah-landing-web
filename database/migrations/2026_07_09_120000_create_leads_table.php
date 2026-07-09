<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('branch');                 // branch key (see resources/content/branches.php)
            $table->date('reserve_date')->nullable();
            $table->unsignedSmallInteger('pax')->nullable();
            $table->text('message')->nullable();
            $table->string('source')->default('reservation_form');
            $table->timestamps();

            $table->index(['branch', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
