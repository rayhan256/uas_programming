@extends('dashboard')
@section('content')
    <h1 class="display-4 text-center mb-4 mt-4">Update Costumer</h1>
    <form action="/updateBarang/proses" method="post">
        {{ csrf_field() }}
        @foreach ($barang as $i)
        <input type="hidden" name="id_barang" value="{{$i->id_barang}}">
        <div class="form-group">
            <label for="">Nama Costumer</label>
            <input type="text" name="nama_barang" class="form-control" value="{{$i->nama_barang}}">
        </div>
        <div class="form-group">
            <label for="">Satuan</label>
            <input type="text" name="satuan" class="form-control" value="{{$i->satuan}}">
        </div>
        <div class="form-group">
            <label for="">Jumlah</label>
            <input type="text" name="jumlah" class="form-control" value="{{$i->jumlah}}">
        </div>
        <div class="form-group">
            <label for="">Harga</label>
            <input type="text" name="harga" class="form-control" value="{{$i->harga}}">
        </div>
        <input type="submit" value="Update Costumer" class="btn btn-primary">
        @endforeach
    </form>
@endsection