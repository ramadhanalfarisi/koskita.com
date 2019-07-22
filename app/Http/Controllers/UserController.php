<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kost;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use File;
use App\Fasilitas;
use App\Relationship;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        return redirect('login');
    }
    public function login()
    {
        return view('login');
    }
    public function createkost()
    {
        $fasilitas = Fasilitas::all();
        return view('createkost', compact('fasilitas'));
    }
    public function register()
    {
        return view('register');
    }

    // it's function that make RestFul API #Read
    public function getapi()
    {
        $getapi = Kost::all();
        if(count($getapi) > 0){
            $data = [
                "message" => "Berhasil Get Data",
                "values" => $getapi,
                "code" => 200
            ];
            return response()->json($data);
        }else{
            $data = [
                "message" => "Berhasil Get Data",
                "values" => "Not Found",
                "code" => 404
            ];
            return response()->json($data);
        }
        
    }

    // it's function that make RestFul API #Insert
    public function insertapi(Request $request)
    {
        $insert = $request->input('nama_fasilitas');
        $insertapi = Kost::create($insert);
        if(count($insertapi) > 0){
            $data = [
                "message" => "Berhasil Get Data",
                "values" => "Success",
                "code" => 200
            ];
            return response()->json($data);
        }else{
            $data = [
                "message" => "Berhasil Get Data",
                "values" => "Error",
                "code" => 404
            ];
            return response()->json($data);
        }
        
        return response()->json($data);
    }

    // it's function that make RestFul API #Update
    public function updateapi(Request $request)
    {
        $update = $request->input('nama_fasilitas');
        $id = $request->input('id');
        $updateapi = Kost::where('id',$id)->update($update);
        if(count($updateapi) > 0){
            $data = [
                "message" => "Berhasil Get Data",
                "values" => "Success",
                "code" => 200
            ];
            return response()->json($data);
        }else{
            $data = [
                "message" => "Berhasil Get Data",
                "values" => "Error",
                "code" => 404
            ];
            return response()->json($data);
        }
        
        return response()->json($data);
    }

     // it's function that make RestFul API #Delete
     public function deleteapi(Request $request)
     {
         $id = $request->input('id');
         $deleteapi = Kost::where('id',$id)->delete();
         if(count($deleteapi) > 0){
             $data = [
                 "message" => "Berhasil Get Data",
                 "values" => "Success",
                 "code" => 200
             ];
             return response()->json($data);
         }else{
             $data = [
                 "message" => "Berhasil Get Data",
                 "values" => "Error",
                 "code" => 404
             ];
             return response()->json($data);
         }
         
         return response()->json($data);
     }

    public function create(Request $request)
    {
        if (Session::get('login') == true) {
            $this->validate($request, [
                'nama_kost' => 'required',
                'alamat_kost' => 'required',
                'harga' => 'required',
                'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $nama_kost = $request->input('nama_kost');
            $alamat = $request->input('alamat_kost');
            $harga = $request->input('harga');
            $fasilitas = $request->input('fasilitas');
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
            $file->move('file', $nama_file);
            $datakost = [
                "nama_kost" => $nama_kost,
                "alamat" => $alamat,
                "harga" => $harga,
                "file" => $nama_file
            ];
            $tambah = Kost::create($datakost);
            if (count($tambah) > 0) {
                $id = Kost::where('nama_kost', $nama_kost)->where('alamat', $alamat)->get();
                foreach ($fasilitas as $fas) {
                    $datafasilitas = [
                        "kost_id" => $id[0]->id,
                        "fasilitas_id" => $fas
                    ];
                    DB::table('fasilitas_kost')->insert($datafasilitas);
                }
                return redirect('read')->with('success', 'Berhasil Tambah Data');
            } else {
                return redirect('read')->with('error', 'Gagal Tambah Data');
            }
        } else {
            return redirect('login')->with('error', 'Harus Login Dulu');
        }
    }

    public function read()
    {
        if (Session::get('login') == true) {
            $read = Kost::all();
            return view('dashboard', compact('read'));
        } else {
            return redirect('login')->with('error', 'Harus Login Dulu');
        }
    }

    public function go_login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $password = md5($request->input('password'));

        $where = User::where('email', $email)->where('password', $password)->get();
        if (count($where) > 0) {
            Session::put('login', true);
            return redirect('read')->with('success', 'Berhasil Login');
        } else {
            return redirect('login')->with('error', 'Gagal Login');
        }
    }
    public function delete($id)
    {
        if (Session::get('login') == true) {
            $delete = Kost::where('id', $id)->delete();
            if (count($delete) > 0) {
                return redirect('read')->with('success', 'Berhasil Hapus Data');
            } else {
                return redirect('read')->with('error', 'Gagal Hapus Data');
            }
        } else {
            return redirect('login')->with('error', 'Harus Login Dulu');
        }
    }
    public function get_update($id)
    {
        if (Session::get('login') == true) {
            $get_where = Kost::where('id', $id)->get();
            $fasilitas_kost = Fasilitas::all();
            $get_wheref = DB::table('fasilitas_kost')->where('kost_id',$id)->get();
            if ($get_where->count() > 0) {
                return view('editkost', compact('get_where','fasilitas_kost','get_wheref'));
            }
        } else {
            return redirect('login')->with('error', 'Harus Login Dulu');
        }
    }
    public function edit(Request $request)
    {
        if (Session::get('login') == true) {
            $this->validate($request, [
                'nama_kost' => 'required',
                'alamat_kost' => 'required',
                'harga' => 'required',
            ]);
            $id = $request->input('id');
            $nama_kost = $request->input('nama_kost');
            $alamat = $request->input('alamat_kost');
            $harga = $request->input('harga');
            $foto = $request->input('file');
            $file_lama = $request->input('file_lama');
            $fasilitas = $request->input('fasilitas');
            if($foto == ""){
                $data = [
                    "id" => $id,
                    "nama_kost" => $nama_kost,
                    "alamat" => $alamat,
                    "harga" => $harga,
                    "file" => $file_lama
                ];
            }else {
                $data = [
                    "id" => $id,
                    "nama_kost" => $nama_kost,
                    "alamat" => $alamat,
                    "harga" => $harga,
                    "file" => $foto
                ];
            }
            $edit = Kost::where('id', $id)->update($data);
            if (count($edit) > 0) {
                DB::table('fasilitas_kost')->where('kost_id',$id)->delete();
                foreach ($fasilitas as $fas) {
                    $datafasilitas = [
                        "kost_id" => $id,
                        "fasilitas_id" => $fas
                    ];
                    DB::table('fasilitas_kost')->insert($datafasilitas);
                }
                return redirect('read')->with('success', 'Berhasil Edit Data');
            } else {
                return redirect('read')->with('error', 'Gagal Edit Data');
            }
        } else {
            return redirect('login')->with('error', 'Harus Login Dulu');
        }
    }

    public function logout()
    {
        Session::flush('login');
        return redirect('login');
    }

    public function go_register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:10',
            'email' => 'required',
            'password' => 'required',
            'repassword' => 'required'
        ]);
        $username = $request->input('name');
        $email = $request->input('email');
        $password = md5($request->input('password'));
        $repassword = md5($request->input('repassword'));

        $data = [
            "name" => $username,
            "email" => $email,
            "password" => $password
        ];

        if ($repassword == $password) {
            $register = User::create($data);
            if (count($register) > 0) {
                Session::put('login', true);
                return redirect('read')->with('success', 'Selamat Anda Berhasil Register !');
            } else {
                return redirect('login')->with('error', "Anda Gagal Regiser");
            }
        } else {
            return redirect('register')->with('error', 'Retype Password Anda Tidak Sama');
        }
    }

    public function detail($id)
    {
        $getDetail = Kost::where('id', $id)->get();
        return view('detail', compact('getDetail'));
    }

    //function to use softDelete, you can visit this site to get more detail https://www.malasngoding.com/soft-deletes-laravel/
    public function trash()
    {
        // to read all of data
        // $trash = Kost::withTrashed()->get();

        // only read data that softdeleted
        $trash = Kost::onlyTrashed()->get();
        return view('trash', compact('trash'));
    }

    public function restore($id)
    {
        if (Session::get('login') == true) {
            $restore = Kost::onlyTrashed()->where('id', $id)->restore();
            if (count($restore) > 0) {
                return redirect('trash')->with('success', 'Berhasil Restore Data');
            } else {
                return redirect('trash')->with('error', 'Gagal Restore Data');
            }
        } else {
            return redirect('login')->with('error', 'Harus Login Dulu');
        }
    }

    public function forcedelete($id)
    {
        if (Session::get('login') == true) {
            $file = Kost::onlyTrashed()->where('id', $id)->first();
            $gambar = File::delete('file/' . $file->file);
            $force = Kost::onlyTrashed()->where('id', $id)->forceDelete();
            if (count($gambar) > 0) {
                if (count($force) > 0) {
                    DB::table('fasilitas_kost')->where('kost_id',$id)->delete();
                    return redirect('trash')->with('success', 'Berhasil Delete Data');
                } else {
                    return redirect('trash')->with('error', 'Gagal Delete Data');
                }
            } else {
                return redirect('trash')->with('error', 'Gagal Delete Data');
            }
        } else {
            return redirect('login')->with('error', 'Harus Login Dulu');
        }
    }

    // public function user()
    // {
    //     $user = Auth::user();
    //     $email = Auth::user()->email;
    //     $id = Auth::user()->id;
    //     $name = Auth::user()->name;
    // }
}
