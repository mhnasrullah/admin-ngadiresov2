<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penyuratan;

class dokumenApiC extends Controller
{
    public function index(){
        $data = Penyuratan::all();
        return response()->json($data);
    }
}
