@extends('dashboard')
@section('content')
<h1 class="text-center mb-4 mt-5">Tabel Costumer</h1>
<div class="row">
    <button class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#exampleModal">Tambah</button>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id Costumer</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Telpon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($costumer as $c)
            <tr>
                <td>{{$c->id_costumer}}</td>
                <td>{{$c->nama}}</td>
                <td>{{$c->alamat}}</td>
                <td>{{$c->kota}}</td>
                <td>{{$c->telpon}}</td>
                <td>
                    <a href="/updateCostumer/{{$c->id_costumer}}"><button class="btn btn-primary">Update</button></a>
                    <a href="/deleteCostumer/{{$c->id_costumer}}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Costumer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tambahCostumer" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="id_costumer" placeholder="Id Costumer" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama" placeholder="Nama Costumer" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="alamat" placeholder="alamat Costumer" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="kota" placeholder="Kota Asal" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="telpon" placeholder="No HP" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Costumer</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
