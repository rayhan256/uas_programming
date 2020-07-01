@extends('dashboard')
@section('content')
    <h1 class="display-4 text-center mb-4 mt-4">Update Transaksi</h1>
    <form action="/updateTransaksi/proses" method="post">
        {{ csrf_field() }}
        @foreach ($transaksi as $i)
        <input type="hidden" name="no_order" value="{{$i->no_order}}">
        <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{$i->tanggal}}">
        </div>
        @endforeach
        <div class="form-group">
            <label for="">Sub Total</label>
            <select name="sub_total" class="form-control">
                <?php 
                    $harga = DB::table('barang')->get();
                    foreach ($harga as $k) :    
                ?>
                <option value="<?= $k->total ?>"><?= $k->total ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Nama Barang</label>
            <select name="id_barang" class="form-control">
                <?php 
                    $id_barang = DB::table('barang')->get();
                    foreach ($id_barang as $k) :    
                ?>
                <option value="<?= $k->id_barang ?>"><?= $k->nama_barang ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Nama Customer</label>
            <select name="id_costumer" class="form-control">
                <?php 
                    $costumer = DB::table('customer')->get();
                    foreach ($costumer as $k) :    
                ?>
                <option value="<?= $k->id_costumer ?>"><?= $k->nama ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <input type="submit" value="Update Costumer" class="btn btn-primary">
    </form>
@endsection