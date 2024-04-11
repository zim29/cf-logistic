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
        Schema::create('dispatch_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('creator_id');
            $table->foreignId('warehouse_id')
                ->nullable();
            $table->foreignId('driver_id')
                ->nullable();
            $table->boolean('on_delivery')
                ->default(false);
            $table->text('items');
            $table->boolean('status')
                ->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatch_orders');
    }
};
