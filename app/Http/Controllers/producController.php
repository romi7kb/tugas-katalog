<?php

namespace App\Http\Controllers;

use App\Produc;
use Illuminate\Http\Request;

class producController extends Controller
{
    function tampil()
    {
        $producs = Produc::all();
        return view('produc', [
            'producs' => $producs,
            'a' => true

        ]);
    }
}
