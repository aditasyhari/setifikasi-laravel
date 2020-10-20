<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Kategori';
        $data = kategori::all();
        return view('admin.kategori.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form Input Kategori';
        return view('admin.kategori.create', compact('pagename'));
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
            'nama_kategori' => 'required',
            'status_kategori' => 'required'
        ]);

        $data_tugas = new kategori([
            'nama_kategori' => $request->get('nama_kategori'),
            'status_kategori' => $request->get('status_kategori')
        ]);

        $data_tugas->save();
        return redirect('admin/kategori')->with(['status' => 'Data Berhasil Disimpan']);
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
        $pagename = 'Edit Kategori';
        $data = kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('data', 'pagename'));
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
            'nama_kategori' => 'required',
            'status_kategori' => 'required'
        ]);

        $data_kategori = kategori::findOrFail($id);

        $data_kategori->nama_kategori = $request->get('nama_kategori');
        $data_kategori->status_kategori = $request->get('status_kategori');
        

        $data_kategori->update();
        return redirect('admin/kategori')->with(['status' => 'Data Berhasil Diubah']);
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
        kategori::destroy($id);
        return redirect('admin/kategori')->with(['delete' => 'Data Berhasil Dihapus']);
    }
}
