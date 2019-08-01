@extends('layout/main')
@section('title','produc')
@section('content')
<div class="container">
    <div class="row mt-5">
        @foreach($producs as $produc)
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-3  mt-4">
            <div class="box">
                <div class="content text-center">
                    <img class="rounded" src="{{asset('/img/'.$produc->gambar)}}" height="140" width="140">
                    <h5 class="card-title text-center">{{$produc->nama}}</h5>
                    <p class="card-text text-center">Rp.{{$produc->harga}}</p>
                    <p class="card-text harga"><small class="text-muted">Last updated {{$produc->updated_at}}</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div> @endsection