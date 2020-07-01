<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Costumer extends Controller {
    //
    public function index() {
        $costumer = DB::table('customer')->get();
        return view('costumer', ['costumer' => $costumer]);
    }

    public function tambahCostumer(Request $req) {
        DB::table('customer')->insert([
            'id_costumer' => $req->id_costumer,
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'kota' => $req->kota,
            'telpon' => $req->telpon
        ]);
        return \redirect('costumer');
    }

    public function updateView($id) {
        $costumer = DB::table('customer')->where('id_costumer', $id)->get();
        return view('updateCostumer', ['costumer' => $costumer]);
    }

    public function update(Request $req) {
        DB::table('customer')->where('id_costumer', $req->id_costumer)->update([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'kota' => $req->kota,
            'telpon' => $req->telpon
        ]);

        return \redirect('costumer');
    }

    public function delete($id) {
        DB::table('customer')->where('id_costumer', $id)->delete();
        return \redirect('costumer');
    }
}