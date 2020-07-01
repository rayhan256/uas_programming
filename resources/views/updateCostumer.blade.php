@extends('dashboard')
@section('content')
    <h1 class="display-4 text-center mb-4 mt-4">Update Costumer</h1>
    <form action="/updateCostumer/proses" method="post">
        {{ csrf_field() }}
        @foreach ($costumer as $i)
        <input type="hidden" name="id_costumer" value="{{$i->id_costumer}}">
        <div class="form-group">
            <label for="">Nama Costumer</label>
            <input type="text" name="nama" class="form-control" value="{{$i->nama}}">
        </div>
        <div class="form-group">
            <label for="">Alamat Costumer</label>
            <input type="text" name="alamat" class="form-control" value="{{$i->alamat}}">
        </div>
        <div class="form-group">
            <label for="">Kota</label>
            <input type="text" name="kota" class="form-control" value="{{$i->kota}}">
        </div>
        <div class="form-group">
            <label for="">Telpon</label>
            <input type="text" name="telpon" class="form-control" value="{{$i->telpon}}">
        </div>
        <input type="submit" value="Update Costumer" class="btn btn-primary">
        @endforeach
    </form>
@endsection