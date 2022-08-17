<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Validator;

class beritaCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'active' => 'berita',
            'data' => Berita::orderByDesc('id')->get()
        ];
        // dd($data);
        return view('table.berita',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'active' => 'berita'
        ];
        return view('create.berita',$data);
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
            'slug' => 'required|unique:beritas|alpha_dash',
            'judul' => 'required',
            'text' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg',
        ],
        $message = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute sudah digunakan',
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
            'alpha_dash' => 'slug dilarang selain berupa huruf,pisah(-),garis bawah(_)'
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*'),
                'oldslug' => $r->slug,
                'oldjudul' => $r->judul,
                'oldtext' => $r->text,
            ];
            return redirect()->to('/berita/create')->with('error',$error);
        }

        $file = $r->file('foto');
        $filename = time().'.'.$file->extension();
        
        $path = $file->storeAs('public/berita',$filename);
        $berita = Berita::create([
            'slug' => $r->slug,
            'judul' => $r->judul,
            'text' => $r->text,
            'foto' => "/storage/berita/$filename"
        ]);
        return redirect()->to('/berita')->with('success','Data berhasil ditambahkan');
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
            'data' => Berita::find($id),
            'active' => 'berita'
        ];
        return view('edit.berita',$data);
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
        $rules = [
            'judul' => 'required',
            'text' => 'required',
            'foto' => 'mimes:jpg,png,jpeg',
        ];
        
        $last = Berita::where('id', $id)->first();
        if($r->slug != $last->slug){
            $rules['slug'] = 'required|unique:beritas';
        }else{
            $rules['slug'] = 'required';
        }

        $val = Validator::make( $r->all(), $rules,
        $message = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute sudah digunakan',
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*'),
                'oldslug' => $r->slug,
                'oldjudul' => $r->judul,
                'oldtext' => $r->text,
            ];
            return redirect()->to('/berita/edit/'.$id)->with('error',$error);
        }
        
        $fotodir = explode('/',$last['foto']);
        $foto = end($fotodir);
        $fotoname = explode('.',$foto);

        $data = [
            'slug' => $r->slug,
            'judul' => $r->judul,
            'text' => $r->text
        ];

        // dd($newname);
        
        $file = $r->file('foto');
        // dd($file);
        if($file != null){
            $filex = $file->extension();
            $newname = $fotoname[0].'.'.$filex;

            Storage::delete('public/berita/'.$foto);
            $file->storeAs('public/berita/',$newname);
            
            $data['foto'] = "/storage/berita/$newname";
        }

        $last->update($data);

        return redirect()->to('/berita')->with('success','Data berhasil diubah');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Berita::find($id);
        $fotodir = explode('/',$data['foto']);
        $foto = end($fotodir);
        
        Storage::delete('public/berita/'.$foto);
        $data->delete();
        return redirect()->to('/berita')->with('success','Data berhasil dihapus');
    }
}
