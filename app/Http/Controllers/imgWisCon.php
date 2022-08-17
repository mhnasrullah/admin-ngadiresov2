<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\ImgWisata;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class imgWisCon extends Controller
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
            'id_wisata' => $id,
            'wisata' => Wisata::find($id),
            'data' => ImgWisata::where('wisata_id',$id)->orderByDesc('id')->get()
        ];
        return view('table.imgwisata',$data);
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
        $val = Validator::make($r->all(),[
            'foto' => 'required|mimes:jpg,png,jpeg',
        ],
        $message = [
            'required' => ':attribute harus diisi',
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/wisata/'.$id.'/gambar')->with('error',$error);
        }
        
        $file = $r->file('foto');
        $filename = time().'.'.$file->extension();
        
        $path = $file->storeAs('public/wisata',$filename);
        $wisata = ImgWisata::create([
            'wisata_id' => $id,
            'foto' => "/storage/wisata/$filename"
        ]);
        return redirect()->to('/wisata/'.$id.'/gambar')->with('success','Gambar berhasil ditambahkan');
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
    public function destroy($id,$foto)
    {
        $data = ImgWisata::where([
            'wisata_id' => $id,
            'id' => $foto
        ])->first();
        $fotodir = explode('/',$data['foto']);
        $foto = end($fotodir);
        
        Storage::delete('public/wisata/'.$foto);
        $data->delete();
        return redirect()->to('/wisata/'.$id.'/gambar')->with('success','Data berhasil dihapus');
    }
}
