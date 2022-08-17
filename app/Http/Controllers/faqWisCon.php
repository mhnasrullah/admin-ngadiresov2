<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqWis;
use App\Models\Wisata;
use Illuminate\Support\Facades\Validator;

class faqWisCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = [
            'active' => 'wisata',
            'wisata' => Wisata::find($id),
            'id_wisata' => $id,
            'data' => FaqWis::where('wisata_id',$id)->orderByDesc('id')->get()
        ];
        // dd($data['data']);
        return view('table.faqwisata',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r,$id)
    {
        $val = Validator::make( $r->all(), [
            'tanya' => 'required',
            'jawab' => 'required'
        ],
        $message = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute sudah digunakan',
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*'),
                'oldtanya' => $r->tanya,
                'oldjawab' => $r->jawab
            ];
            return redirect()->to('/wisata/'.$id.'/faq')->with('error',$error);
        }
        
        $data = FaqWis::create([
            'wisata_id' => $id,
            'quest' => $r->tanya,
            'ans' => $r->jawab
        ]);
        
        return redirect()->to('/wisata/'.$id.'/faq')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$faq)
    {
        $data = FaqWis::where([
            'wisata_id' => $id,
            'id' => $faq
        ])->first();

        $data->delete();
        return redirect()->to('/wisata/'.$id.'/faq')->with('success','Data berhasil dihapus');
    }
}
