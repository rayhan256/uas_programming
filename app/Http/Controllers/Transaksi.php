<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Transaksi extends Controller
{
    //
    public function index() {
        $transaksi = DB::table('transaksi')->get();
        return view('transaksi', ['transaksi' => $transaksi]);
    }

    public function tambahTransaksi(Request $req) {
        $discount = 0;
        $subtotal = $req->sub_total;

        if ($subtotal <= 2500000) {
            $discount = 0.1;
        } else if ($subtotal <= 4000000) {
            $discount = 0.2;
        } else {
            $discount = 0;
        }

        $discount_bayar = $discount * $subtotal;
        $total_bayar = $subtotal - $discount_bayar;

        DB::table('transaksi')->insert([
            'no_order' => $req->no_order,
            'tanggal' => $req->tanggal,
            'sub_total' => $subtotal,
            'discount' => $discount_bayar,
            'total_bayar' => $total_bayar,
            'id_barang' => $req->id_barang,
            'id_costumer' => $req->id_costumer
        ]);
        return \redirect('transaksi');
    }

    public function updateView($id) {
        $transaksi = DB::table('transaksi')->where('no_order', $id)->get();
        return view('updateTransaksi', ['transaksi' => $transaksi]);
    }

    public function update(Request $req) {
        $discount = 0;
        $subtotal = $req->sub_total;

        if ($subtotal <= 2500000) {
            $discount = 0.1;
        } else if ($subtotal <= 4000000) {
            $discount = 0.2;
        } else {
            $discount = 0;
        }

        $discount_bayar = $discount * $subtotal;
        $total_bayar = $subtotal - $discount_bayar;

        DB::table('transaksi')->where('no_order', $req->no_order)->update([
            'tanggal' => $req->tanggal,
            'sub_total' => $req->sub_total,
            'discount' => $discount_bayar,
            'total_bayar' => $total_bayar,
            'id_barang' => $req->id_barang,
            'id_costumer' => $req->id_costumer
        ]);

        return \redirect('transaksi');
    }

    public function delete($id) {
        DB::table('transaksi')->where('no_order', $id)->delete();
        return \redirect('transaksi');
    }
}