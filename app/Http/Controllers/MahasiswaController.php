<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prodi = Prodi::all();
        if (count($prodi) == 0) {
            return redirect('/prodi')->with('success','Tidak terdapat prodi, Silahkan tambahkan terlebih dahulu!');
        }

        $url = route('mahasiswa.store');

        $data = [
            'url'=>$url,
            'mahasiswa'=>null,
            'action'=>'Tambah',
            'prodi'=>$prodi,
        ];

        return view('mahasiswa.form', $data);
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
            'nama_mahasiswa' => 'required',
            'umur'=>'required|integer',
            'alamat'=>'required',
            'telepon'=>'required',
            'email'=>'required|email',
            'tanggal_lahir'=>'required|date',
            'prodi_id'=>'required'
        ]);

        $mahasiswa = new Mahasiswa([
            'nama_mahasiswa'=>$request->get('nama_mahasiswa'),
            'umur'=>$request->get('umur'),
            'alamat'=>$request->get('alamat'),
            'telepon'=>$request->get('telepon'),
            'email'=>$request->get('email'),
            'tanggal_lahir'=>$request->get('tanggal_lahir'),
            'prodi_id'=>$request->get('prodi_id'),
        ]);
        $mahasiswa->save();

        return redirect('/mahasiswa')->with('success', 'Data saved!');
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
        $url = route('mahasiswa.update', $id);
        $data = [
            'url'=>$url,
            'mahasiswa'=>Mahasiswa::find($id),
            'action'=>'Edit',
            'prodi'=>Prodi::all(),
        ];

        return view('Mahasiswa.form')->with($data);
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
            'nama_mahasiswa' => 'required',
            'umur'=>'required|integer',
            'alamat'=>'required',
            'telepon'=>'required',
            'email'=>'required|email',
            'tanggal_lahir'=>'required|date',
            'prodi_id'=>'required'
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama_mahasiswa = $request->get('nama_mahasiswa');
        $mahasiswa->umur = $request->get('umur');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->telepon = $request->get('telepon');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $mahasiswa->prodi_id = $request->get('prodi_id');
        $mahasiswa->save();

        return redirect('/mahasiswa')->with('success', 'Data berhasil diupdate');
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
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('success', 'Data berhasil dihapuskan');
    }
}
