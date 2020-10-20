<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Task;
use App\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Tugas';
        // $data = Task::all();
        $data = DB::table('tasks')
                    ->join('kategoris', 'tasks.id_kategori', '=', 'kategoris.id')
                    ->select('tasks.id','tasks.nama_tugas','tasks.ket_tugas','tasks.status_tugas','kategoris.nama_kategori')
                    ->get();

        // dd($data);
        return view('admin.tugas.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_kategori = kategori::all();
        $pagename = 'Form Input Tugas';
        return view('admin.tugas.create', compact('pagename', 'data_kategori'));
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
            'nama_tugas' => 'required',
            'kategori_tugas' => 'required',
            'ket_tugas' => 'required',
            'status_tugas' => 'required'
        ]);

        $data_tugas = new Task([
            'nama_tugas' => $request->get('nama_tugas'),
            'id_kategori' => $request->get('kategori_tugas'),
            'ket_tugas' => $request->get('ket_tugas'),
            'status_tugas' => $request->get('status_tugas')
        ]);

        $data_tugas->save();
        return redirect('admin/tugas')->with(['status' => 'Data Berhasil Disimpan']);
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
        $data_kategori = kategori::all();
        $pagename = 'Edit Tugas';
        $data = Task::findOrFail($id);
        return view('admin.tugas.edit', compact('data', 'pagename', 'data_kategori'));
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
            'nama_tugas' => 'required',
            'kategori_tugas' => 'required',
            'ket_tugas' => 'required',
            'status_tugas' => 'required'
        ]);

        $data_tugas = Task::findOrFail($id);

        $data_tugas->nama_tugas = $request->get('nama_tugas');
        $data_tugas->id_kategori = $request->get('kategori_tugas');
        $data_tugas->ket_tugas = $request->get('ket_tugas');
        $data_tugas->status_tugas = $request->get('status_tugas');
        

        $data_tugas->update();
        return redirect('admin/tugas')->with(['status' => 'Data Berhasil Diubah']);
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
        Task::destroy($id);
        return redirect('admin/tugas')->with(['delete' => 'Data Berhasil Dihapus']);
    }
}
