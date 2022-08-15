<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Edit;

class dashApiC extends Controller
{
    public function index(){
        $data = Edit::first();
        return response()->json($data);
    }
}
