<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\FaqWis;
use App\Models\ImgWisata;

class wisataApiC extends Controller
{
    public function index(){
        $data = Wisata::all();
        return response()->json($data);
    }
    public function one($slug){
        $wisata = Wisata::where('slug',$slug)->first();
        $data=[
            'data' => $wisata,
            'gambar' => ImgWisata::where('wisata_id',$wisata['id'])->get(),
            'faq' => FaqWis::where('wisata_id',$wisata['id'])->get(),
        ];
        return response()->json($data);
    }
}
