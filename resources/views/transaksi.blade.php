@extends('dashboard')
@section('content')
    <h1 class="text-center display-4 mt-4 mb-4">Halaman Transaksi</h1>
    <div class="row">
        <button class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#exampleModal">Tambah Transaksi</button>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No Order</th>
                <th>Tanggal</th>
                <th>Sub Total</th>
                <th>Diskon</th>
                <th>Total Bayar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $t)
            <tr>
                <td>{{$t->no_order}}</td>
                <td>{{$t->tanggal}}</td>
                <td>{{$t->sub_total}}</td>
                <td>{{$t->discount}}</td>
                <td>{{$t->total_bayar}}</td>
                <td>
                    <a href="/updateTransaksi/{{$t->no_order}}"><button class="btn btn-primary">Update</button></a>
                    <a href="/deleteTransaksi/{{$t->no_order}}"><button class="btn btn-danger">Delete</button></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tambahTransaksi" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="no_order" placeholder="No Order" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="date" name="tanggal" placeholder="Tanggal Transaksi" class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="sub_total" placeholder="" class="form-control">
                                <?php
                                $bayar = DB::table('barang')->get(); 
                                foreach ($bayar as $s):
                                $subtotal = $s->total
                                ?>
                                <option value="<?= $subtotal ?>"><?= $subtotal ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="id_barang" class="form-control">
                                <?php 
                                $barang = DB::table('barang')->get();
                                foreach ($barang as $s):
                                ?>
                                <option value="<?= $s->id_barang ?>"><?= $s->nama_barang ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="id_costumer" class="form-control">
                                <?php 
                                $costumer = DB::table('customer')->get();
                                foreach ($costumer as $s):
                                ?>
                                <option value="<?= $s->id_costumer ?>"><?= $s->id_costumer ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection