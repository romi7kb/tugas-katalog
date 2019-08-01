@extends('layout/main')

@section('title','Halaman Admin')

@section('content')
<div class="container mt-5">
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Tambah data
        </button>
    </p>
    <div class="collapse" id="collapseExample">

        <form action="{{ url('crud') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" ">
            </div>
            <div class=" form-group">

                <label for=" harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="form-group">
                <br>
                <label for=" deskripsi">Deskripsi</label>
                <textarea cols="40" rows="4" id="deskripsi" name="deskripsi"></textarea>
                <br>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select class="form-control" name="jenis" id="jenis">
                    <option value="Headset">Headset</option>
                    <option value="Headphone">Headphone</option>
                    <option value="Earphone">Earphone</option>
                    <option value="Handsfree">Handsfree</option>
                </select>
            </div>
            <div class="form-group">
                <label for=" gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-3">tambah</button>
        </form>
    </div>
    @include('common/errors')
    <div class="pane-body">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Jenis</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @foreach($producs as $produc)
            <tbody>
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$produc->nama}}</td>
                    <td>{{$produc->harga}}</td>
                    <td>{{$produc->deskripsi}}</td>
                    <td>{{$produc->jenis}}</td>
                    <td><img src="{{asset('/img/'.$produc->gambar)}}" width="40" height="40" alt=""></td>
                    <td>
                        <form class="" action="{{url('crud/delete' . $produc->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash">Hapus</i>
                            </button>
                            <a href="/crud/{{$produc->id}}" class="btn btn-warning">Ubah</a>

                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection