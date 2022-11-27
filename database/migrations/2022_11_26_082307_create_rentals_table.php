<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string("Nama_Peminjam");
            $table->string("Email_Peminjam");
            $table->string("Nomer_Hp_Peminjam");
            $table->string("Nama_Mobil");
            $table->date("Tanggal_Dipinnjam");
            $table->date("Tanggal_Pengembalian");
            $table->integer("Biaya_Sewa");
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
        Schema::dropIfExists('rentals');
    }
}
