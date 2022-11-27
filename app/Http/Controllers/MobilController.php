<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Mobil::all();
        return response()->json([
            'status' => '200',
            'message' => 'sata succesfully sent',
            'data' => $mobil
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
        $mobil = Mobil::create([
            "Nama_Mobil" => $request->Nama_Mobil,
            "Harga_Sewa" => $request->Harga_Sewa,
            "Code_Mobil" => $request->Code_Mobil,
            "Plat_Nomor" => $request->Plat_Nomor
        ]);

        return response()->json([
            'status' => 201,
            'message' => 'data berhasil dibuat',
            'data' => $mobil
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
        $mobil = Mobil::find($id);
        if($mobil){
            return response()->json([
                'status' => '200',
                'message' => 'sata succesfully sent',
                'data' => $mobil
            ], 200);
        }
        else{
            return response()->json([
                'status' => '404',
                'message' => 'data not found',
                'data' => $mobil
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
        $mobil = Mobil::find($id);
        if($mobil){
            $mobil->Nama_Mobil = $request->Nama_Mobil ? $request->Nama_Mobil : $mobil->Nama_Mobil;
            $mobil->Harga_Sewa = $request->Harga_Sewa ? $request->Harga_Sewa : $mobil->Harga_Sewa;
            $mobil->Code_Mobil = $request->Code_Mobil ? $request->Code_Mobil : $mobil->Code_Mobil;
            $mobil->Plat_Nomor = $request->Plat_Nomor ? $request->Plat_Nomor : $mobil->Plat_Nomor;
            $mobil->save();
            return response()->json([
                'status' => '200',
                'message' => 'data succesfully updated',
                'data' => $mobil
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
        $mobil = Mobil::where('id', $id)->first();
        if ($mobil){
            $mobil->delete();
            return response()->json([
                'status' => '200',
                'message' => "data succesfully deleted",
                'data' => $mobil
            ], 200);
        }else {
            return response()->json([
                'status' => '404',
                'message' => "mobil id $id not found",
                'data' => $mobil
            ], 404);
        };
    }
}
