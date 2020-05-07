<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuSubitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_subitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_item_id');
            $table->foreign('menu_item_id')
                ->references('id')->on('menu_items')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('route_name')->nullable();
            $table->bigInteger('status')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_subitems');
    }
}
