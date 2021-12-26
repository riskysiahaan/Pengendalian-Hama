<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\JenisPenanganan;
use App\Models\JenisTempat;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jenispenanganan = JenisPenanganan::all();
        $jenistempat = JenisTempat::all();
        return view('pesanan.index', compact(['jenispenanganan', 'jenistempat']));
    }

    public function getPesanan(Request $request, Pesanan $pesanan)
    {
        $data = $pesanan->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditArticleData" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function store(Request $request, Pesanan $article)
    {
        $validator = \Validator::make($request->all(), [
            'nama_Pemesan' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $article->storeData($request->all());

        return response()->json(['success'=>'Article added successfully']);
    }
}
