<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function show()
    {
        $data = DB::table('transaksi')
            ->join('pelanggan', 'transaksi.id_pelanggan', '=', 'pelanggan.id_pelanggan')
            ->join('petugas', 'transaksi.id_petugas', '=', 'petugas.id_petugas')
            ->select('transaksi.id_pelanggan', 'transaksi.id_petugas', 'transaksi.tgl_transaksi')
            ->get();
        return Response()->json($data);
    }


    public function store(Request $request)
 {
    $validator=Validator::make($request->all(),
        [
            'id_pelanggan' => 'required',
            'id_petugas' => 'required',
            'tgl_transaksi' => 'required',
        ]
    );
    if($validator->fails()) {
        return Response()->json($validator->errors());
    }
    $simpan = Transaksi::create([
        'id_pelanggan' => $request->id_pelanggan,
        'id_petugas' => $request->id_petugas,
        'tgl_transaksi' => date("Y-m-d")
    ]);
 if($simpan)
 {
 return Response()->json(['status' => 1]);
 }
 else
 {
 return Response()->json(['status' => 0]);
 }
 }
}