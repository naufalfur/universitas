<?php

namespace App\Http\Controllers;

use App\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fakultas = Fakultas::all();

        return view('fakultas.index', ['fakultas' => $fakultas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $url = route('fakultas.store');

        $data = [
            'url'=>$url,
            'fakultas'=>null,
            'action'=>'Tambah'
        ];

        return view('fakultas.form', $data);
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
            'nama_fakultas' => 'required',
        ]);

        $fakultas = new Fakultas([
            'nama_fakultas'=>$request->get('nama_fakultas'),
        ]);
        $fakultas->save();

        return redirect('/fakultas')->with('success', 'Data saved!');
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
        $data = [
            'action' => 'Edit',
            'url' => route('fakultas.update', $id),
            'fakultas' => Fakultas::find($id),
        ];

        return view('fakultas.form')->with($data);
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
            'nama_fakultas' => 'required',
        ]);

        $fakultas = Fakultas::find($id);
        $fakultas->nama_fakultas = $request->get('nama_fakultas');
        $fakultas->save();

        return redirect('/fakultas')->with('success', 'Data berhasil diupdate');
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
        $fakultas = Fakultas::find($id);
        $fakultas->delete();

        return redirect('/fakultas')->with('success', 'Data berhasil dihapuskan');
    }
}
