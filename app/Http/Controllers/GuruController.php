<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    function index(){
        $data=array(
            'table' =>DB::table('tb_guru')->get()
        );
        return view('guru.index',$data);
    }

    public function create()
    {
    	return view('guru.create');
    }

    public function store(Request $request)
    {
       	$tanggalid=\Carbon\Carbon::parse($request->tanggal_lahir)->translatedFormat('d F Y');
       	$cek = DB::table('tb_guru')->where('nip',$request->nip)->get();

       	if (count($cek) > 0) {
       		session()->flash('error', 'NIS Sudah Ada');
        	return redirect(route('guru.index'));
       	}else{
       		DB::table('tb_guru')->insert([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'jk' => $request->jk,
            'nik' => $request->nik,
            'ttl' => $request->tempat_lahir.', '.$tanggalid,
            'no_telepon' => $request->no_telepon,
            'alamat_lengkap' => $request->alamat_lengkap,
            'jabatan' => $request->jabatan,
            'pangkat' => $request->pangkat,
            'unit_kerja' => $request->unit_kerja,
            'agama' => $request->agama,
            'status_guru' => 'Aktif',
            'dibuat_pada' =>  now(),
        	]);
        	session()->flash('success', 'Data Berhasil Ditambahkan');
        	return redirect(route('guru.index'));
       	}

    }

    public function edit($id)
    {
        $qry = DB::table ('tb_guru')
        ->where('nip',$id)
        ->first();

        $data=array(
            'qry' => $qry
        );
        return view('guru.edit',$data);

    }

    public function update(Request $request)
    {

        $qry = 	DB::table('tb_guru')
	       		->where('nip',$request->nip)
				->update([
	            'nama_guru' => $request->nama_guru,
	            'jk' => $request->jk,
	            'ttl' => $request->tempat_lahir,
	            'no_telepon' => $request->no_telepon,
	            'alamat_lengkap' => $request->alamat_lengkap,
	            'pangkat' => $request->pangkat,
	            'jabatan' => $request->jabatan,
	            'unit_kerja' => $request->unit_kerja,
	            'diupdate_pada' => now()
	        	]);

      	if ($qry) {
      		session()->flash('success', 'Data Berhasil Diupdate');
       	}else{
       		session()->flash('error', 'Gagal Edit Data');
       	}
        return redirect()->route('guru.index');
    }

    public function destroy($id)
    {
    
        $hapus = DB::table('tb_guru')->where('nip',$id)->delete();
        if ($hapus) {
      		session()->flash('success', 'Data Berhasil Dihapus');
       	}else{
       		session()->flash('error', 'Gagal Hapus Data');
       	}
        return redirect()->back();
    }

}
