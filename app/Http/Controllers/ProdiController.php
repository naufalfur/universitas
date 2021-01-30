<?php

namespace App\Http\Controllers;

use App\Fakultas;
use App\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prodi = Prodi::all();

        return view('prodi.index', ['prodi' => $prodi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        if (count($fakultas) == 0) {
            return redirect('/fakultas')->with('success','Tidak terdapat fakultas, Silahkan tambahkan terlebih dahulu!');
        }
        //
        $url = route('prodi.store');

        $data = [
            'url'=>$url,
            'prodi'=>null,
            'action'=>'Tambah',
            'fakultas'=>$fakultas
        ];

        return view('prodi.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_prodi' => 'required',
            'jenjang'=>'required',
            'waktu_tempuh_minimal'=>'required|integer',
            'waktu_tempuh_maksimal'=>'required|integer',
            'fakultas_id'=>'required'
        ]);

        $prodi = new Prodi([
            'nama_prodi'=>$request->get('nama_prodi'),
            'jenjang'=>$request->get('jenjang'),
            'waktu_tempuh_minimal'=>$request->get('waktu_tempuh_minimal'),
            'waktu_tempuh_maksimal'=>$request->get('waktu_tempuh_maksimal'),
            'fakultas_id'=>$request->get('fakultas_id'),
        ]);
        $prodi->save();

        return redirect('/prodi')->with('success', 'Data saved!');
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
        $url = route('prodi.update', $id);
        $data = [
            'url'=>$url,
            'prodi'=>Prodi::find($id),
            'action'=>'Edit',
            'fakultas'=>Fakultas::all(),
        ];

        return view('prodi.form')->with($data);
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
        $request->validate([
            'nama_prodi' => 'required',
            'jenjang'=>'required',
            'waktu_tempuh_minimal'=>'required|integer',
            'waktu_tempuh_maksimal'=>'required|integer',
            'fakultas_id'=>'required'
        ]);

        $prodi = Prodi::find($id);
        $prodi->nama_prodi = $request->get('nama_prodi');
        $prodi->jenjang = $request->get('jenjang');
        $prodi->waktu_tempuh_minimal = $request->get('waktu_tempuh_minimal');
        $prodi->waktu_tempuh_maksimal = $request->get('waktu_tempuh_maksimal');
        $prodi->fakultas_id = $request->get('fakultas_id');
        $prodi->save();

        return redirect('/prodi')->with('success', 'Data berhasil diupdate');
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
        $prodi = Prodi::find($id);
        $prodi->delete();

        return redirect('/prodi')->with('success', 'Data berhasil dihapuskan');
    }
}
