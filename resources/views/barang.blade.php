@extends('dashboard')
@section('content')
    <h1 class="text-center display-4 mt-4 mb-4">Data Barang</h1>
    <div class="row">
        <button class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#exampleModal">Tambah Barang</button>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $b)
            <tr>
                <td>{{$b->id_barang}}</td>
                <td>{{$b->nama_barang}}</td>
                <td>{{$b->satuan}}</td>
                <td>{{$b->jumlah}}</td>
                <td>{{$b->harga}}</td>
                <td>{{$b->total}}</td>
                <td>
                    <a href="/updateBarang/{{$b->id_barang}}"><button class="btn btn-primary">Update</button></a>
                    <a href="/deleteBarang/{{$b->id_barang}}"><button class="btn btn-danger">Delete</button></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tambahBarang" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="id_barang" placeholder="Id Barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="satuan" placeholder="Satuan" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="jumlah" placeholder="Jumlah Barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="harga" placeholder="Harga" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Barang</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection