<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable();
            $table->foreignId('nft_type_id')->nullable();
            $table->string('title');
            $table->string('description');
            $table->string('url')->nullable();
            $table->foreignId('owned_by')->default(0);
            $table->string('image')->nullable();
            $table->string('box_row_number');
            $table->string('box_column_number');
            $table->string('price')->nullable(0.20);
            $table->text('website_url')->nullable();
            $table->string('open_sea_url')->nullable();
            $table->string('ether_scan_url')->nullable();
            $table->string('purchase_type')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('boxes');
    }
}
