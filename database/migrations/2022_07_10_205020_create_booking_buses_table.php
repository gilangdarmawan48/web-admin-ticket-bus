<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_buses', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('companies_id');
            $table->foreignId('bus_schedule_id');
            $table->string('nama_orang_tua');
            $table->string('umur_orang_tua');
            $table->string('jenis_kelamin_orang_tua');
            $table->string('nama_anak')->nullable();
            $table->string('umur_anak')->nullable();
            $table->string('jenis_kelamin_anak')->nullable();
            $table->string('email');
            $table->string('nomor_telepon');
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
        Schema::dropIfExists('booking_buses');
    }
}
