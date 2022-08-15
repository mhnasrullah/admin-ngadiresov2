<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Edit;

class dashCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'active' => 'dashboard',
            'data' => Edit::first()
        ];
        return view('table.dashboard',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function updTentangDesa(Request $r){
        $data = Edit::first();
        $data->tentangDesa = $r->text;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function updSamKades(Request $r){
        $data = Edit::first();
        $data->sambutanKades = $r->text;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function updNamaKades(Request $r){
        $data = Edit::first();
        $data->namaKades = $r->text;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function jmlPria(Request $r){
        $data = Edit::first();
        $data->jmlPria = $r->text;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function jmlWanita(Request $r){
        $data = Edit::first();
        $data->jmlWanita = $r->text;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function jmlPenduduk(Request $r){
        $data = Edit::first();
        $data->jmlPenduduk = $r->text;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }
    
    public function updJumbotron(Request $r){
        $data = Edit::first();

        $fotodir = explode('/',$data['jumbotron']);
        $foto = end($fotodir);

        $val = Validator::make($r->all(),[
            'foto' => 'required|mimes:jpg,png,jpeg',
        ],
        $message = [
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/')->with('error',$error);
        }

        Storage::delete('public/edit/'.$foto);

        $jumbotron = $r->foto;
        $jumbotronName = 'jumbotron.'.$jumbotron->extension();
        $jumbotron->storeAs('public/edit',$jumbotronName);

        $data->jumbotron = '/storage/edit/'.$jumbotronName;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function updImgTentangDesa(Request $r){
        $data = Edit::first();

        $fotodir = explode('/',$data['imgTentangDesa']);
        $foto = end($fotodir);

        $val = Validator::make($r->all(),[
            'foto' => 'required|mimes:jpg,png,jpeg',
        ],
        $message = [
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/')->with('error',$error);
        }

        Storage::delete('public/edit/'.$foto);

        $imgTentangDesa = $r->foto;
        $imgTentangDesaName = 'imgTentangDesa.'.$imgTentangDesa->extension();
        $imgTentangDesa->storeAs('public/edit',$imgTentangDesaName);

        $data->imgTentangDesa = '/storage/edit/'.$imgTentangDesaName;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function updImgKades(Request $r){
        $data = Edit::first();

        $fotodir = explode('/',$data['imgKades']);
        $foto = end($fotodir);

        $val = Validator::make($r->all(),[
            'foto' => 'required|mimes:jpg,png,jpeg',
        ],
        $message = [
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/')->with('error',$error);
        }

        Storage::delete('public/edit/'.$foto);

        $imgKades = $r->foto;
        $imgKadesName = 'imgKades.'.$imgKades->extension();
        $imgKades->storeAs('public/edit',$imgKadesName);

        $data->imgKades = '/storage/edit/'.$imgKadesName;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function updJmbtSejarah(Request $r){
        $data = Edit::first();

        $fotodir = explode('/',$data['jmbtSejarah']);
        $foto = end($fotodir);

        $val = Validator::make($r->all(),[
            'foto' => 'required|mimes:jpg,png,jpeg',
        ],
        $message = [
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/')->with('error',$error);
        }

        Storage::delete('public/edit/'.$foto);

        $jmbtSejarah = $r->foto;
        $jmbtSejarahName = 'jmbtSejarah.'.$jmbtSejarah->extension();
        $jmbtSejarah->storeAs('public/edit',$jmbtSejarahName);

        $data->jmbtSejarah = '/storage/edit/'.$jmbtSejarahName;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function updJmbtKabar(Request $r){
        $data = Edit::first();

        $fotodir = explode('/',$data['jmbtKabar']);
        $foto = end($fotodir);

        $val = Validator::make($r->all(),[
            'foto' => 'required|mimes:jpg,png,jpeg',
        ],
        $message = [
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/')->with('error',$error);
        }

        Storage::delete('public/edit/'.$foto);

        $jmbtKabar = $r->foto;
        $jmbtKabarName = 'jmbtKabar.'.$jmbtKabar->extension();
        $jmbtKabar->storeAs('public/edit',$jmbtKabarName);

        $data->jmbtKabar = '/storage/edit/'.$jmbtKabarName;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function updJmbtFaq(Request $r){
        $data = Edit::first();

        $fotodir = explode('/',$data['jmbtFaq']);
        $foto = end($fotodir);

        $val = Validator::make($r->all(),[
            'foto' => 'required|mimes:jpg,png,jpeg',
        ],
        $message = [
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/')->with('error',$error);
        }

        Storage::delete('public/edit/'.$foto);

        $jmbtFaq = $r->foto;
        $jmbtFaqName = 'jmbtFaq.'.$jmbtFaq->extension();
        $jmbtFaq->storeAs('public/edit',$jmbtFaqName);

        $data->jmbtFaq = '/storage/edit/'.$jmbtFaqName;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function updJmbtWisata(Request $r){
        $data = Edit::first();

        $fotodir = explode('/',$data['jmbtWisata']);
        $foto = end($fotodir);

        $val = Validator::make($r->all(),[
            'foto' => 'required|mimes:jpg,png,jpeg',
        ],
        $message = [
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/')->with('error',$error);
        }

        Storage::delete('public/edit/'.$foto);

        $jmbtWisata = $r->foto;
        $jmbtWisataName = 'jmbtWisata.'.$jmbtWisata->extension();
        $jmbtWisata->storeAs('public/edit',$jmbtWisataName);

        $data->jmbtWisata = '/storage/edit/'.$jmbtWisataName;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }

    public function updJmbtSurat(Request $r){
        $data = Edit::first();

        $fotodir = explode('/',$data['jmbtSurat']);
        $foto = end($fotodir);

        $val = Validator::make($r->all(),[
            'foto' => 'required|mimes:jpg,png,jpeg',
        ],
        $message = [
            'mimes' => 'format :attribute harus berupa jpg,png,jpeg',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/')->with('error',$error);
        }

        Storage::delete('public/edit/'.$foto);

        $jmbtSurat = $r->foto;
        $jmbtSuratName = 'jmbtSurat.'.$jmbtSurat->extension();
        $jmbtSurat->storeAs('public/edit',$jmbtSuratName);

        $data->jmbtSurat = '/storage/edit/'.$jmbtSuratName;
        $data->save();
        return redirect()->to('/')->with('success','Data berhasil diperbarui');
    }
}
