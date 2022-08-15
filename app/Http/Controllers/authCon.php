<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class authCon extends Controller
{
    public function create(){
        if(User::first()==null){
            return view('auth.register');
        }else{
            return redirect()->to('login');
        }
    }
    public function login(){
        return view('auth.login');
    }
    public function logout(Request $r){
        Auth::logout();
        $r->session()->flush();
        return redirect('/');
    }
    public function edit(){
        $data = [
            'active' => 'akun',
            'data' => User::first()
        ];
        return view('auth.edit',$data);
    }

    public function updateEmail(Request $r){

        $val = Validator::make($r->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ],
        $message = [
            'required' => ':attribute harus diisi',
            'email' => ':attribute harus sesuai',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/akun/edit')->with('error',$error);
        }

        $user = User::first();
        
        if (Hash::check($r->password, $user['password'])) {
            $user->email = $r->email;
            $user->save();
            return redirect()->to('/akun/edit')->with('success','Email berhasil diubah');
        }else{
            return redirect()->to('/akun/edit')->with('notCorrect','Password tidak sesuai');
        }
    }

    public function updatePass(Request $r){
        $val = Validator::make($r->all(),[
            'newpassword' => 'required',
            'repassword' => 'required|same:newpassword',
            'lastpassword' => 'required'
        ],
        $message = [
            'required' => 'password harus diisi',
            'same' => 'pengulangan password tidak sesuai'
        ]);
        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/akun/edit')->with('error',$error);
        }

        $user = User::first();
        
        if (Hash::check($r->lastpassword, $user['password'])) {
            $user->password = bcrypt($r->newpassword);
            $user->save();
            return redirect()->to('/akun/edit')->with('success','Password berhasil diubah');
        }else{
            return redirect()->to('/akun/edit')->with('notCorrect','Password tidak sesuai');
        }

    }

    public function log(Request $r){
        // $credentials = $r->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
        $val = Validator::make($r->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ],
        $message = [
            'required' => ':attribute harus diisi',
            'email' => ':attribute harus sesuai',
        ]);

        if($val->fails()){
            $error = [
                'error' => $val->messages()->get('*')
            ];
            return redirect()->to('/login')->with('error',$error);
        }
        
        if (Auth::attempt(
            ['email' => $r->email, 'password' => $r->password]
            )) {
                $r->session()->regenerate();
                return redirect()->intended('/');
            }else{
                return redirect()->to('/login')->with('notCorrect','Email atau password tidak sesuai');
        }
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
    }

    public function register(Request $r){
        User::create([
            'name' => 'admin_ngadireso',
            'email' => $r->email,
            'password' => bcrypt($r->pass),
        ]);
        return redirect()->to('/login');
    }
}
