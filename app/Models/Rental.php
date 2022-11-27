<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        "Nama_Peminjam",
        "Email_Peminjam",
        "Nomer_Hp_Peminjam",
        "Nama_Mobil",
        "Tanggal_Dipinnjam",
        "Tanggal_Pengembalian",
        "Biaya_Sewa"
    ];
}
