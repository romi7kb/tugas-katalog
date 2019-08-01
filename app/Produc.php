<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produc extends Model
{
    protected $fillable = ['nama', 'harga', 'deskripsi', 'jenis', 'gambar'];
    public $j = ['Headset', 'Headphone', 'Earphone', 'Handsfree'];
}
