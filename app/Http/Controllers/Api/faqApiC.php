<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
class faqApiC extends Controller
{
    public function index(){
        $data = Faq::all();
        return response()->json($data);
    }
}
