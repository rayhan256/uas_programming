<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Barang extends Controller
{
    //

    public function index() {
        $barang = DB::table('barang')->get();
        return view('barang', ['barang' => $barang]);
    }

    public function tambahBarang(Request $req) {
        $jumlah = $req->jumlah;
        $harga = $req->harga;
        $total = $jumlah * $harga;
        DB::table('barang')->insert([
            'id_barang' => $req->id_barang,
            'nama_barang' => $req->nama_barang,
            'satuan' => $req->satuan,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'total' => $total
        ]);
        return \redirect('barang');
    }

    public function updateView($id) {
        $barang = DB::table('barang')->where('id_barang', $id)->get();
        return view('updateBarang', ['barang' => $barang]);
    }

    public function update(Request $req) {
        $jumlah = $req->jumlah;
        $harga = $req->harga;
        $total = $jumlah * $harga;
        DB::table('barang')->where('id_barang', $req->id_barang)->update([
            'nama_barang' => $req->nama_barang,
            'satuan' => $req->satuan,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'total' => $total
        ]);
        return \redirect('barang');
    }

    public function delete($id) {
        DB::table('barang')->where('id_barang', $id)->delete();
        return \redirect('barang');
    }
}