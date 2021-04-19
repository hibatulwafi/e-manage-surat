<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RakController extends Controller
{
    function index(){

        $data=array(
            'table' =>DB::table('tb_rak')->get()
        );
        return view('rak.index',$data);
    }

 	public function create()
    {
       return view('rak.create');
    }

    public function store(Request $request)
    {
       
       	$cek = DB::table('tb_rak')->where('kode_rak',$request->kode_rak)->get();

       	if (count($cek) > 0) {
       		session()->flash('error', 'Kode Rak Sudah Ada');
       	}else{
       		DB::table('tb_rak')->insert([
            'kode_rak' => $request->kode_rak,
            'nama_rak' => $request->nama_rak,
            'keterangan_rak' => $request->keterangan_rak,
            'status_rak' => 1,
            'created_at' => now()
        	]);
        	session()->flash('success', 'Data Berhasil Ditambahkan');
       	}

        return redirect(route('rak.index'));
    }

	public function edit($id)
    {
        $qry = DB::table ('tb_rak')
        ->where('id_rak',$id)
        ->first();

        $data=array(
            'qry' => $qry,
        );
        return view('rak.edit',$data);

    }

    public function update(Request $request)
    {

        $qry = 	DB::table('tb_rak')
	       		->where('id_rak',$request->id_rak)
				->update([
	            'kode_rak' => $request->kode_rak,
	            'nama_rak' => $request->nama_rak,
	            'keterangan_rak' => $request->keterangan_rak,
	            'status_rak' => 1,
	            'updated_at' => now()
	        	]);

      	if ($qry) {
      		session()->flash('success', 'Data Berhasil Diupdate');
       	}else{
       		session()->flash('error', 'Gagal Edit Data');
       	}
        return redirect()->route('rak.index');
    }

    public function destroy($id)
    {
        $hapus = DB::table('tb_rak')->where('id_rak',$id)->delete();
        if ($hapus) {
      		session()->flash('success', 'Data Berhasil Dihapus');
       	}else{
       		session()->flash('error', 'Gagal Hapus Data');
       	}
        return redirect()->back();
    }

}
