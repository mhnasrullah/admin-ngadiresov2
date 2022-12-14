<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\ImgWisata;
use App\Models\FaqWis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
            'active' => 'wisata',
            'data' => Wisata::orderByDesc('id')->get()
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
    public function store(Request $r)
    {

        $val = Validator::make($r->all(),[
            'slug' => 'required|unique:wisatas|alpha_dash',
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
            'alpha_dash' => 'slug dilarang selain berupa huruf,pisah(-),garis bawah(_)'
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
        
        return redirect()->to('/wisata')->with('success','Data wisata dan hiburan berhasil ditambahkan');
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
        $data = [
            'data' => Wisata::find($id),
            'active' => 'wisata'
        ];
        return view('edit.wisata',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $rule = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'tiket' => 'required',
            'alamat' => 'required',
            'waktu' => 'required',
            'map' => 'required',
        ];

        $data = Wisata::find($id);
        if($r->slug != $data['slug']){
            $rule['slug'] = 'required|unique:wisatas';
        }else{
            $rule['slug'] = 'required';
        }

        $val = Validator::make($r->all(),$rule,
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
            return redirect()->to('/wisata/edit/'.$id)->with('error',$error);
        }
        
        $wisata = [
            'slug' => $r->slug,
            'nama' => $r->nama,
            'deskripsi' => $r->deskripsi,
            'tiket' => $r->tiket,
            'alamat' => $r->alamat,
            'waktu' => $r->waktu,
            'map' => $r->map,
            'video' => $r->video,
        ];
        
        $data->update($wisata);
        
        return redirect()->to('/wisata')->with('success','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fotoWisata = ImgWisata::where('wisata_id',$id)->get();
        if($fotoWisata){
            foreach($fotoWisata as $f){
                $fotodir = explode('/',$f['foto']);
                $foto = end($fotodir);
                
                Storage::delete('public/wisata/'.$foto);
                $f->delete();
            }
        }
        $faqWisata = FaqWis::where('wisata_id',$id)->get();
        if($faqWisata){
            foreach($faqWisata as $f){
                $f->delete();
            }
        }

        $wisata = Wisata::find($id);
        $wisata->delete();

        return redirect()->to('/wisata')->with('success','Data berhasil dihapus');
    }
}
