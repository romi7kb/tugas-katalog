<?php

namespace App\Http\Controllers;

use App\Produc;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class crudController extends Controller
{
    function crud()
    {
        $producs = Produc::all();
        return view('crud', [
            'producs' => $producs,
            'a' => false
        ]);
    }
    function delete($id)
    {
        $produc = Produc::all()->find($id);
        File::delete('img/' . $produc->gambar);
        $produc->find($id)->delete();
        return redirect('crud');
    }
    function Tambah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:191',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar' => 'required|image'

        ]);
        if ($validator->fails()) {
            return redirect('/crud')
                ->withInput()
                ->withErrors($validator);
        }
        $produc = new Produc;
        $produc->nama = $request->nama;
        $produc->harga = $request->harga;
        $produc->jenis = $request->jenis;
        $produc->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('img/', $request->file('gambar')->getClientOriginalName());
            $produc->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $produc->save();
        return redirect('/crud');
    }
    public function ubah($id)
    {

        $produc = Produc::all()->find($id);
        return view('ubah', [
            'produ' => $produc,
            'a' => false,
            'je' => $produc->j
        ]);
    }
    public function ubah2(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:191',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',

        ]);

        $produc = Produc::all()->find($id);
        $produc->nama = $request->nama;
        $produc->harga = $request->harga;
        $produc->jenis = $request->jenis;
        $produc->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            $validator = Validator::make($request->all(), [
                'gambar' => 'required|image'
            ]);
            if ($validator->fails()) {
                return redirect('/crud/' . $id)
                    ->withInput()
                    ->withErrors($validator);
            }
            unlink('img/' . $produc->gambar);
            $request->file('gambar')->move('img/', $request->file('gambar')->getClientOriginalName());
            $produc->gambar = $request->file('gambar')->getClientOriginalName();
        } else {
            $produc->gambar = $produc->gambar;
        }
        if ($validator->fails()) {
            return redirect('/crud/' . $id)
                ->withInput()
                ->withErrors($validator);
        }
        $produc->update();
        return redirect('crud');
    }
}
