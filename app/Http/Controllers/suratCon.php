<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Penyuratan;

class suratCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'active' => 'surat',
            'data' => Penyuratan::orderByDesc('id')->get()
        ];
        return view('table.dokumen',$data);
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
    public function store(Request $r)
    {
        $val = Validator::make($r->all(),[
            'nama' => 'required',
            'link' => 'required',
        ],
        $message = [
            'required' => ':attribute harus diisi',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*'),
                'oldlink' => $r->link,
                'oldnama' => $r->nama,
            ];
            return redirect()->to('/dokumen')->with('error',$error);
        }
        
        $data = Penyuratan::create([
            'nama' => $r->nama,
            'link' => $r->link,
        ]);
        
        return redirect()->to('/dokumen')->with('success','Data berhasil ditambahkan');
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
    public function destroy($id)
    {
        $data = Penyuratan::find($id);
        $data->delete();
        return redirect()->to('/dokumen')->with('success','Data berhasil dihapus');
    }
}
