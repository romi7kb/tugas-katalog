@extends('layout/main')

@section('title','Ubah')

@section('content')
<div class="container mt-5">
    <form action="{{ url('/crud/'.$produ->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('common/errors')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{$produ->nama}}">
        </div>
        <div class="form-group">
            <label for=" harga">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" value="{{$produ->harga}}">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea cols="40" rows="4" id="deskripsi" name="deskripsi">{{$produ->deskripsi}}</textarea>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis</label>
            <select class="form-control" name="jenis" id="jenis">
                @foreach($je as $jeni)
                <option value="{{$jeni}}" {{ $produ->jenis == $jeni ? 'selected="selected"' : ''}}>{{$jeni}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <img width="100" src="{{asset('/img/'.$produ->gambar)}}" alt="">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>
</div>
@endsection