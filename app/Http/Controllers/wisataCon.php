<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;

class wisataCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'active' => 'wisata'
        ];
        return view('table.wisata',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'active' => 'wisata'
        ];
        return view('create.wisata',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $val = Validator::make($r->all(),[
            'slug' => 'required|unique:wisatas',
            'nama' => 'required',
            'deskripsi' => 'required',
            'tiket' => 'required',
            'alamat' => 'required',
            'waktu' => 'required',
            'map' => 'required',
        ],
        $message = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute sudah digunakan',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*'),
                'oldslug' => $r->slug,
                'oldnama' => $r->nama,
                'olddeskripsi' => $r->deskripsi,
                'oldtiket' => $r->tiket,
                'oldalamat' => $r->alamat,
                'oldwaktu' => $r->waktu,
                'oldmap' => $r->map,
            ];
            return redirect()->to('/wisata/create')->with('error',$error);
        }
        
        $wisata = Wisata::create([
            'slug' => $r->slug,
            'nama' => $r->nama,
            'deskripsi' => $r->deskripsi,
            'tiket' => $r->tiket,
            'alamat' => $r->alamat,
            'waktu' => $r->waktu,
            'map' => $r->map,
            'video' => $r->video,
        ]);
        
        return new WisataSrc(true,"Wisata berhasil ditambahkan!",$wisata);
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
        //
    }
}
