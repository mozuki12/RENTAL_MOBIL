<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rental = Rental::all();
        return response()->json([
            'status' => '200',
            'message' => 'sata succesfully sent',
            'data' => $rental
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rental = Rental::create([
            "Nama_Peminjam" => $request->Nama_Peminjam,
            "Email_Peminjam" => $request->Email_Peminjam,
            "Nomer_Hp_Peminjam" => $request->Nomer_Hp_Peminjam,
            "Nama_Mobil" => $request->Nama_Mobil,
            "Tanggal_Dipinnjam" => $request->Tanggal_Dipinnjam,
            "Tanggal_Pengembalian" => $request->Tanggal_Pengembalian,
            "Biaya_Sewa" => $request->Biaya_Sewa
        ]);

        return response()->json([
            'status' => 201,
            'message' => 'data berhasil dibuat',
            'data' => $rental
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rental = Rental::find($id);
        if($rental){
            return response()->json([
                'status' => '200',
                'message' => 'sata succesfully sent',
                'data' => $rental
            ], 200);
        }
        else{
            return response()->json([
                'status' => '404',
                'message' => 'data not found',
                'data' => $rental
            ], 404);
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rental = Rental::find($id);
        if($rental){
            $rental->Nama_Peminjam = $request->Nama_Peminjam ? $request->Nama_Peminjam : $rental->Nama_Peminjam;
            $rental->Email_Peminjam = $request->Email_Peminjam ? $request->Email_Peminjam : $rental->Email_Peminjam;
            $rental->Nomer_Hp_Peminjam = $request->Nomer_Hp_Peminjam ? $request->Nomer_Hp_Peminjam : $rental->Nomer_Hp_Peminjam;
            $rental->Nama_Mobil = $request->Nama_Mobil ? $request->Nama_Mobil : $rental->Nama_Mobil;
            $rental->Tanggal_Dipinnjam = $request->Tanggal_Dipinnjam ? $request->Tanggal_Dipinnjam : $rental->Tanggal_Dipinnjam;
            $rental->Tanggal_Pengembalian = $request->Tanggal_Pengembalian ? $request->Tanggal_Pengembalian : $rental->Tanggal_Pengembalian;
            $rental->Biaya_Sewa = $request->Biaya_Sewa ? $request->Biaya_Sewa : $rental->Biaya_Sewa;
            $rental->save();
            return response()->json([
                'status' => '200',
                'message' => 'data succesfully updated',
                'data' => $rental
            ], 200);
        } else{
            return response()->json([
                'status' => '404',
                'message' => 'data not found',
                'data' => 'null'
            ], 404);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rental = Rental::where('id', $id)->first();
        if ($rental){
            $rental->delete();
            return response()->json([
                'status' => '200',
                'message' => "data succesfully deleted",
                'data' => $rental
            ], 200);
        }else {
            return response()->json([
                'status' => '404',
                'message' => "mobil id $id not found",
                'data' => $rental
            ], 404);
        };
    }
}
