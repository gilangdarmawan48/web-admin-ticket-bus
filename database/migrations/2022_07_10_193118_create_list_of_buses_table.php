<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListOfBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_of_buses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('companies_id');
            $table->string('plat_nomor_bus')->unique();
            $table->string('kelas');
            $table->integer('tempat_duduk_orang_tua');
            $table->integer('tempat_duduk_anak');
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
        Schema::dropIfExists('list_of_buses');
    }
}
