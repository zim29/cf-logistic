<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                ->constrained()
                ->restrictOnDelete();
            $table->foreignId('pay_method_id')
                ->nullable()
                ->constrained()
                ->restrictOnDelete();
            $table->string('pay_method_reference')
                ->nullable();
            $table->text('items');
            $table->boolean('status')
                ->default(true);
            $table->boolean('is_approved')
                ->default(false);
            $table->foreignId('creator_id')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
