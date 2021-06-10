<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SuratController extends Controller
{


    
    public function surattugas()
    {
        $data=array(
            'guru' =>DB::table('tb_guru')->get()
        );
       return view('surat.surat_tugas_create',$data);
    }

    public function keterangan()
    {

        $data=array(
            'siswa' =>DB::table('tb_siswa')->get()
        );
       return view('surat.surat_keterangan_create',$data);
    }

    public function getSiswa($id = 0)
    {
        $siswa = DB::table('tb_siswa')->where('nis', $id)->first();
        echo json_encode($siswa);
        exit;    
    }

    public function getGuru($id = 0)
    {
        $guru = DB::table('tb_guru')->where('nip', $id)->first();
        echo json_encode($guru);
        exit;    
    }

   	public function post_surattugas(Request $request)
    {

        $nama_lengkap = $request->nama_lengkap;
        $nip = $request->nip;
        $pangkat = $request->pangkat;
        $jabatan = $request->jabatan;
        $no_surat = $request->no_surat;
		$nama_kegiatan = $request->nama_kegiatan;
        $tempat = $request->tempat;
        $tanggal = date('D / d F Y', strtotime($request->tanggal));
        $jam = $request->jam;



		$tanggalid=\Carbon\Carbon::parse($request->tanggal)->translatedFormat('l / d F Y');

      	/* echo $nama_lengkap."<br/>";
       	echo $nip."<br/>";
        echo $pangkat."<br/>";
        echo $jabatan."<br/>";

        echo $nama_kegiatan."<br/>";
        echo $tempat."<br/>";
        echo $tanggal."<br/>";
        echo $jam."<br/>";*/

        $data=array(
            'nama_lengkap' => $nama_lengkap,
            'nip' => $nip,
            'pangkat' => $pangkat,
            'jabatan' => $jabatan,
            'unit_kerja' => 'SEKOLAH MENENGAH ATAS NEGERI 1 CIKEMBAR',
            'nama_kegiatan' => $nama_kegiatan,
            'tanggal' => $tanggalid,
            'jam' => $jam,
            'tempat' => $tempat,
            'no_surat' => $no_surat,

        );

/*    	$pdf = PDF::loadview('cetak.surattugas',$data);
*/    	return view('cetak.surattugas',$data);

    }

    public function post_keterangan(Request $request)
    {

        $nis = $request->nis;
        $nisn = $request->nisn;
        $nama = $request->nama;
        $kelas = $request->kelas;
        $ttl = $request->ttl;
        $jk = $request->jk;
        $alamat = $request->alamat;
        $no_surat = $request->no_surat;

        $data=array(
            'nis' => $nis,
            'nisn' => $nisn,
            'nama' => $nama,
            'kelas' => $kelas,
            'ttl' => $ttl,
            'jk' => $jk,
            'alamat' => $alamat,
            'no_surat' => $no_surat,
            'tanggal' => $tanggalid=\Carbon\Carbon::parse(now())->translatedFormat('l / d F Y')

        );

/*      $pdf = PDF::loadview('cetak.surattugas',$data);
*/      return view('cetak.suratketerangan',$data);

    }

    public function suratketerangan()
    {
    	
    }


}
