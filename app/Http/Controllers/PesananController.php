<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\JenisPenanganan;
use App\Models\JenisTempat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Pesanan::orderBy('created_at','asc')->paginate(5);
            return view('pesanan.list',compact('collection'));
        }
        return view('pesanan.main');
    }

    public function create()
    {
        $jenispenanganan = JenisPenanganan::all();
        $jenistempat = JenisTempat::all();
        return view('pesanan.input',["jenispenanganan" => $jenispenanganan, "jenistempat" => $jenistempat, "pesanan" => New pesanan]);
    }

    public function edit(Pesanan $pesanan)
    {
        $jenispenanganan = JenisPenanganan::all();
        $jenistempat = JenisTempat::all();
        return view('pesanan.input',compact('pesanan','jenispenanganan','jenistempat'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_Pemesan' => 'required',
            'id_penanganan' => 'required',
            'id_jenis_tempat' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'alamat' => 'required',
            'tanggal_pengerjaan' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_Pemesan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_Pemesan'),
                ]);
            } elseif ($errors->has('id_penanganan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_penanganan'),
                ]);
            } elseif ($errors->has('id_jenis_tempat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_jenis_tempat'),
                ]);
            } elseif ($errors->has('panjang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('panjang'),
                ]);
            }elseif ($errors->has('status')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status'),
                ]);
            }  
            elseif ($errors->has('lebar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('lebar'),
                ]);
            } elseif ($errors->has('alamat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('alamat'),
                ]);
            } elseif ($errors->has('tanggal_pengerjaan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_pengerjaan'),
                ]);
            } elseif ($errors->has('no_telp')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_telp'),
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }
        }
        $pesanan = New Pesanan;
        $pesanan->id_penanganan = $request->id_penanganan;
        $pesanan->id_jenis_tempat= $request->id_jenis_tempat;
        $pesanan->nama_Pemesan = $request->nama_Pemesan;
        $pesanan->panjang = $request->panjang;
        $pesanan->lebar = $request->lebar;
        $pesanan->alamat = $request->alamat;
        $pesanan->tanggal_pengerjaan = $request->tanggal_pengerjaan;
        $pesanan->no_telp = $request->no_telp;
        $pesanan->email = $request->email;
        $pesanan->status = 'Pending';

        $id_penanganan = $request->id_penanganan;
        if($id_penanganan == 1){
            $harga_penanganan = 55000;
        }else if($id_penanganan == 2){
            $harga_penanganan = 60000;
        }else if($id_penanganan == 3){
            $harga_penanganan = 50000;
        }

        $id_jenis_tempat = $request->id_jenis_tempat;
        if($id_jenis_tempat == 1){
            $harga_tempat = 3450000;
        }else if($id_jenis_tempat == 2){
            $harga_tempat = 2900000;
        }else if($id_jenis_tempat == 3){
            $harga_tempat = 3000000;
        }else if($id_jenis_tempat == 4){
            $harga_tempat = 3200000;
        }else if($id_jenis_tempat == 5){
            $harga_tempat = 1200000;
        }else if($id_jenis_tempat == 6){
            $harga_tempat = 2800000;
        }

        $hargatotal = (($request->panjang * $request->lebar) * $harga_penanganan) + $harga_tempat;

        $pesanan->harga = $hargatotal;
        $pesanan->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan ' . $request->nama_Pemesan . ' Tersimpan',
        ]);
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $validator = Validator::make($request->all(), [
            'nama_Pemesan' => 'required',
            'id_penanganan' => 'required',
            'id_jenis_tempat' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'tanggal_pengerjaan' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_Pemesan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_Pemesan'),
                ]);
            } elseif ($errors->has('id_penanganan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_penanganan'),
                ]);
            } elseif ($errors->has('id_jenis_tempat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_jenis_tempat'),
                ]);
            }elseif ($errors->has('status')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status'),
                ]);
            } 
            elseif ($errors->has('panjang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('panjang'),
                ]);
            } elseif ($errors->has('lebar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('lebar'),
                ]);
            } elseif ($errors->has('alamat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('alamat'),
                ]);
            } elseif ($errors->has('tanggal_pengerjaan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_pengerjaan'),
                ]);
            } elseif ($errors->has('no_telp')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_telp'),
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }
        }
        $pesanan->id_penanganan = $request->id_penanganan;
        $pesanan->id_jenis_tempat= $request->id_jenis_tempat;
        $pesanan->nama_Pemesan = $request->nama_Pemesan;
        $pesanan->panjang = $request->panjang;
        $pesanan->lebar = $request->lebar;
        $pesanan->status = $request->status;
        $pesanan->alamat = $request->alamat;
        $pesanan->tanggal_pengerjaan = $request->tanggal_pengerjaan;
        $pesanan->no_telp = $request->no_telp;
        $pesanan->email = $request->email;
        $pesanan->harga = 100000;
        $pesanan->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan ' . $request->nama_Pemesan . ' Tersimpan',
        ]);
    }

    public function destroy(Pesanan $pesanan){
        $pesanan->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Product ' . $pesanan->nama_Pemesan . ' Deleted',
        ]);
    }
}