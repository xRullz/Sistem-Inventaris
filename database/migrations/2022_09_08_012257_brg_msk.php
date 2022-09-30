<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brg_msk', function (Blueprint $table) {
            $table->id();
            $table->string('no_brg_msk');
            $table->integer('id_barang');
            $table->integer('id_user');
            $table->integer('jml_brg_msk')->nullable();
            $table->bigInteger('total')->nullable();
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
        Schema::dropIfExists('brg_msk');
    }
};
