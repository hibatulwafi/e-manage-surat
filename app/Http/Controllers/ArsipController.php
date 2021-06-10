<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArsipController extends Controller
{
    function index(){

        $data=array(
            'table' =>DB::table('tb_surat')
            ->join('tb_rak','tb_surat.id_rak','tb_rak.id_rak')->get()
        );
        return view('surat.index',$data);
    }

 	public function create()
    {
		$data=array(
	        'rak' =>DB::table('tb_rak')->get()
	    );

    	return view('surat.create',$data);

    }

    public function store(Request $request)
    {
      $request->validate([
        'file' => 'required|max:5100',
        'id_rak' => 'required',
        'nama_surat' => 'required',
        'keterangan_surat' => 'required',
        'jenis_surat' => 'required',
      ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        // nama file
        $nama_file = time()."_".$file->getClientOriginalName();
        // real path
        $path = $file->getRealPath();
        // ukuran file
        $size = $file->getSize();
        $tujuan_upload = 'surat/';
        // upload file
           
       	$cek = DB::table('tb_surat')->where('nama_surat',$request->nama_surat)->get();

       	if (count($cek) > 0) {
       		session()->flash('error', 'Nama Arsip Sudah Ada');
          return redirect(route('surat.index'));

       	}else{
       		DB::table('tb_surat')->insert([
            'id_rak' => $request->id_rak,
            'nama_surat' => $request->nama_surat,
            'keterangan_surat' => $request->keterangan_surat,
            'jenis_surat' => $request->jenis_surat,
            'path' => $tujuan_upload,
            'file' => $nama_file,
            'status_surat' => 1,
            'created_at' => now()
        	]);
          $file->move($tujuan_upload,$nama_file);
        	session()->flash('success', 'Data Berhasil Ditambahkan');
          return redirect(route('surat.index'));

       	}

    }

	public function edit($id)
    {
        $qry = DB::table ('tb_surat')
        ->where('id_surat',$id)
        ->first();

        $data=array(
            'qry' => $qry,
            'rak' =>DB::table('tb_rak')->get(),
            'cek_rak' =>DB::table('tb_rak')->where('id_rak',$qry->id_rak)->first(),
        );
        return view('surat.edit',$data);

    }

    public function update(Request $request)
    {

        $qry = 	DB::table('tb_surat')
	       		->where('id_surat',$request->id_surat)
				->update([
	            'id_rak' => $request->id_rak,
	            'nama_surat' => $request->nama_surat,
	            'keterangan_surat' => $request->keterangan_surat,
              'no_polis' => $request->no_polis,
              'no_kontrak' => $request->no_kontrak,
              'tanggal_valid' => $request->tanggal_valid,
              'nama_customer' => $request->nama_customer,
	            'status_surat' => 1,
	            'updated_at' => now()
	        	]);

      	if ($qry) {
      		session()->flash('success', 'Data Berhasil Diupdate');
       	}else{
       		session()->flash('error', 'Gagal Edit Data');
       	}
        return redirect()->route('surat.index');
    }

    public function destroy($id)
    {
        $hapus = DB::table('tb_surat')->where('id_surat',$id)->delete();
        if ($hapus) {
      		session()->flash('success', 'Data Berhasil Dihapus');
       	}else{
       		session()->flash('error', 'Gagal Hapus Data');
       	}
        return redirect()->back();
    }

}
