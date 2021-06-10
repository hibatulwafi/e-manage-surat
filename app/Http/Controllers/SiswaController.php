<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    function index(){
        $data=array(
            'table' =>DB::table('tb_siswa')->get()
        );
        return view('siswa.index',$data);
    }

    public function create()
    {
    	return view('siswa.create');
    }

    public function store(Request $request)
    {
       	$tanggalid=\Carbon\Carbon::parse($request->tanggal_lahir)->translatedFormat('d F Y');
       	$cek = DB::table('tb_siswa')->where('nis',$request->nis)->get();

       	if (count($cek) > 0) {
       		session()->flash('error', 'NIS Sudah Ada');
        	return redirect(route('siswa.index'));
       	}else{
       		DB::table('tb_siswa')->insert([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jk,
            'ttl' => $request->tempat_lahir.', '.$tanggalid,
            'no_telepon' => $request->no_telepon,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kelas' => $request->kelas_1.' '.$request->kelas_2.' '.$request->kelas_3,
            'agama' => $request->agama,
            'status_siswa' => 'Aktif',
            'dibuat_pada' =>  now(),
        	]);
        	session()->flash('success', 'Data Berhasil Ditambahkan');
        	return redirect(route('siswa.index'));
       	}

    }

    public function edit($id)
    {
        $qry = DB::table ('tb_siswa')
        ->where('nis',$id)
        ->first();

        $data=array(
            'qry' => $qry
        );
        return view('siswa.edit',$data);

    }

    public function update(Request $request)
    {

        $qry = 	DB::table('tb_siswa')
	       		->where('nis',$request->nis)
				->update([
	            'nama_siswa' => $request->nama_siswa,
	            'jk' => $request->jk,
	            'ttl' => $request->tempat_lahir,
	            'no_telepon' => $request->no_telepon,
	            'alamat_lengkap' => $request->alamat_lengkap,
	            'diupdate_pada' => now()
	        	]);

      	if ($qry) {
      		session()->flash('success', 'Data Berhasil Diupdate');
       	}else{
       		session()->flash('error', 'Gagal Edit Data');
       	}
        return redirect()->route('siswa.index');
    }

    public function destroy($id)
    {
        $hapus = DB::table('tb_siswa')->where('nis',$id)->delete();
        if ($hapus) {
      		session()->flash('success', 'Data Berhasil Dihapus');
       	}else{
       		session()->flash('error', 'Gagal Hapus Data');
       	}
        return redirect()->back();
    }

}
