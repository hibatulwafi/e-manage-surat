<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArsipController extends Controller
{
    function index(){

        $data=array(
            'table' =>DB::table('tb_arsip')
            ->join('tb_rak','tb_arsip.id_rak','tb_rak.id_rak')->get()
        );
        return view('arsip.index',$data);
    }

 	public function create()
    {
		$data=array(
	        'rak' =>DB::table('tb_rak')->get()
	    );

    	return view('arsip.create',$data);

    }

    public function store(Request $request)
    {
       
       	$cek = DB::table('tb_arsip')->where('nama_arsip',$request->nama_arsip)->get();

       	if (count($cek) > 0) {
       		session()->flash('error', 'Nama Arsip Sudah Ada');
       	}else{
       		DB::table('tb_arsip')->insert([
            'id_rak' => $request->id_rak,
            'nama_arsip' => $request->nama_arsip,
            'keterangan_arsip' => $request->keterangan_arsip,
            'no_polis' => $request->no_polis,
            'no_kontrak' => $request->no_kontrak,
            'tanggal_valid' => $request->tanggal_valid,
            'nama_customer' => $request->nama_customer,
            'status_arsip' => 1,
            'created_at' => now()
        	]);
        	session()->flash('success', 'Data Berhasil Ditambahkan');
       	}

        return redirect(route('arsip.index'));
    }

	public function edit($id)
    {
        $qry = DB::table ('tb_arsip')
        ->where('id_arsip',$id)
        ->first();

        $data=array(
            'qry' => $qry,
            'rak' =>DB::table('tb_rak')->get(),
            'cek_rak' =>DB::table('tb_rak')->where('id_rak',$qry->id_rak)->first(),
        );
        return view('arsip.edit',$data);

    }

    public function update(Request $request)
    {

        $qry = 	DB::table('tb_arsip')
	       		->where('id_arsip',$request->id_arsip)
				->update([
	            'id_rak' => $request->id_rak,
	            'nama_arsip' => $request->nama_arsip,
	            'keterangan_arsip' => $request->keterangan_arsip,
              'no_polis' => $request->no_polis,
              'no_kontrak' => $request->no_kontrak,
              'tanggal_valid' => $request->tanggal_valid,
              'nama_customer' => $request->nama_customer,
	            'status_arsip' => 1,
	            'updated_at' => now()
	        	]);

      	if ($qry) {
      		session()->flash('success', 'Data Berhasil Diupdate');
       	}else{
       		session()->flash('error', 'Gagal Edit Data');
       	}
        return redirect()->route('arsip.index');
    }

    public function destroy($id)
    {
        $hapus = DB::table('tb_arsip')->where('id_arsip',$id)->delete();
        if ($hapus) {
      		session()->flash('success', 'Data Berhasil Dihapus');
       	}else{
       		session()->flash('error', 'Gagal Hapus Data');
       	}
        return redirect()->back();
    }

}
