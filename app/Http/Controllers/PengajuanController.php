<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Laravel\Facades\Telegram;
use Auth;

class PengajuanController extends Controller
{
    public function surattugas()
    {

    	if(ucfirst(Auth::user()->roles[0]->name) == "Guru"){
    		$detail = DB::table('tb_login')
    		->join('tb_guru','tb_guru.nip','tb_login.id_profil')
    		->where('tb_login.id_user',Auth::user()->id)
    		->first();

    	}elseif (ucfirst(Auth::user()->roles[0]->name) == "Siswa") {
    		# code...
    	}else{

    	}


        $data=array(
            'guru' =>DB::table('tb_guru')->get(),
            'detail' => $detail
        );
       return view('pengajuan.surat_tugas_create',$data);
    }

    public function surattugaspost(Request $request)
    {
        $nama_lengkap = $request->nama_lengkap;
        $nip = $request->nip;
        $pangkat = $request->pangkat;
        $jabatan = $request->jabatan;

		$nama_kegiatan = $request->nama_kegiatan;
        $tempat = $request->tempat;
        $tanggal = date('D / d F Y', strtotime($request->tanggal));
        $jam = $request->jam;
		$tanggalid=\Carbon\Carbon::parse($request->tanggal)->translatedFormat('l / d F Y');
 
        $insert = DB::table('tb_surat_tugas')->insert([
            'no_surat' => "0",
            'nama_guru' => $nama_lengkap,
            'nip' => $nip,
            'pangkat' => $pangkat,
            'jabatan' => $jabatan,
            'unit_kerja' => 'SEKOLAH MENENGAH ATAS NEGERI 1 CIKEMBAR',
            'nama_kegiatan' => $nama_kegiatan,
            'tanggal' =>$request->tanggal,
            'jam' => $jam,
            'tempat' => $tempat,
            'dibuat_pada' =>  now(),
            ]);

        if ($insert) {
             $text = "Pengajuan Pembuatan Surat Baru!\n"
            . "<b>Surat Tugas</b>\n"
            . "<b>NIP</b> : $nip \n"
            . "<b>Nama</b> : $nama_lengkap \n"
            . "<b>Pangkat</b> : $pangkat \n"
            . "<b>Jabatan</b> : $jabatan \n"
            . "<b>Unit Kerja</b> : SEKOLAH MENENGAH ATAS NEGERI 1 CIKEMBAR \n"
            . "<b>Nama Kegiatan</b> : $nama_kegiatan \n"
            . "<b>Tanggal</b> : $tanggalid \n"
            . "<b>Jam</b> : $jam \n"
            . "<b>Tempat</b> : $tempat \n";

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);

            session()->flash('success', 'Pengajuan Dikirim');
            return redirect(route('pengajuan.status'));


        }else{
             session()->flash('error', 'Gagal');
            return redirect()->back();
        }
           

    }

    public function keterangan()
    {

    	if(ucfirst(Auth::user()->roles[0]->name) == "Guru"){
    		$detail = DB::table('tb_login')
    		->join('tb_guru','tb_guru.nip','tb_login.id_profil')
    		->where('tb_login.id_user',Auth::user()->id)
    		->first();

    	}elseif (ucfirst(Auth::user()->roles[0]->name) == "Siswa") {
    		$detail = DB::table('tb_login')
    		->join('tb_siswa','tb_siswa.nis','tb_login.id_profil')
    		->where('tb_login.id_user',Auth::user()->id)
    		->first();
    	}else{

    	}


        $data=array(
            'siswa' =>DB::table('tb_siswa')->get(),
            'detail' => $detail
        );
       return view('pengajuan.surat_keterangan_create',$data);
    }

    public function keteranganpost(Request $request){


        $nis = $request->nis;
        $nisn = $request->nisn;
        $nama = $request->nama;
        $kelas = $request->kelas;
        $ttl = $request->ttl;
        $jk = $request->jk;
        $alamat = $request->alamat;
       
 
        $insert = DB::table('tb_surat_keterangan')->insert([
            'no_surat' => "0",
            'nis' => $nis,
            'nisn' => $nisn,
            'nama_siswa' => $nama,
            'kelas' => $kelas,
            'ttl' => $ttl,
            'jk' =>$jk,
            'alamat' => $alamat,
            'tanggal' => now(),
            'status_ket' =>1,
            'dibuat_pada' =>  now(),
            ]);

        if ($insert) {
             $text = "Pengajuan Pembuatan Surat Baru!\n"
            . "<b>Surat Keterangan Siswa</b>\n"
            . "<b>NIS</b> : $nis \n"
            . "<b>NISN</b> : $nisn \n"
            . "<b>Nama</b> : $nama \n"
            . "<b>Kelas</b> : $kelas \n"
            . "<b>TTL</b> : $ttl \n"
            . "<b>JK</b> : $jk \n"
            . "<b>Alamat</b> : $alamat \n";

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);

            session()->flash('success', 'Pengajuan Dikirim');
            return redirect(route('pengajuan.status'));


        }else{
             session()->flash('error', 'Gagal');
            return redirect()->back();
        }
    }



    public function status()
    {

        if(ucfirst(Auth::user()->roles[0]->name) == "Guru"){
            $table = DB::table('tb_login')
            ->join('tb_guru','tb_guru.nip','tb_login.id_profil')
            ->join('tb_surat_tugas','tb_guru.nip','tb_surat_tugas.nip')
            ->where('tb_login.id_user',Auth::user()->id)
            ->get();

            $data=array(
            'guru' =>DB::table('tb_guru')->get(),
            'table' => $table
            );
            return view('pengajuan.status',$data);

        }elseif (ucfirst(Auth::user()->roles[0]->name) == "Siswa") {
            $table = DB::table('tb_login')
            ->join('tb_siswa','tb_siswa.nis','tb_login.id_profil')
            ->join('tb_surat_keterangan','tb_siswa.nis','tb_surat_keterangan.nis')
            ->where('tb_login.id_user',Auth::user()->id)
            ->get();

            $data=array(
            'guru' =>DB::table('tb_guru')->get(),
            'table' => $table
            );
            return view('pengajuan.statusket',$data);
        }


       
    }


    public function riwayat()
    {

        if(ucfirst(Auth::user()->roles[0]->name) == "Guru"){
            $table = DB::table('tb_login')
            ->join('tb_guru','tb_guru.nip','tb_login.id_profil')
            ->join('tb_surat_tugas','tb_guru.nip','tb_surat_tugas.nip')
            ->where('tb_login.id_user',Auth::user()->id)
            ->get();

            $data=array(
                'table' => $table
            );

            return view('pengajuan.riwayat',$data);


        }elseif (ucfirst(Auth::user()->roles[0]->name) == "Siswa") {
            $table = DB::table('tb_login')
            ->join('tb_siswa','tb_siswa.nis','tb_login.id_profil')
            ->join('tb_surat_keterangan','tb_siswa.nis','tb_surat_keterangan.nis')
            ->where('tb_login.id_user',Auth::user()->id)
            ->get();

            $data=array(
                'table' => $table
            );
            
            return view('pengajuan.riwayatket',$data);

        }else{

        }



    }




    function approval(){

        $table = DB::table('tb_login')
        ->join('tb_guru','tb_guru.nip','tb_login.id_profil')
        ->join('tb_surat_tugas','tb_guru.nip','tb_surat_tugas.nip')
        ->get();


        $table2 = DB::table('tb_login')
        ->join('tb_siswa','tb_siswa.nis','tb_login.id_profil')
        ->join('tb_surat_keterangan','tb_siswa.nis','tb_surat_keterangan.nis')
        ->get();


        

        $data=array(
            'table' => $table,
            'table2' => $table2,
        );
        return view('approval.index',$data);
    }

    function approval_terima(Request $request){
     
        $cek =  DB::table('tb_surat_tugas')
                  ->where('id_st',$request->id)
                  ->get();
        if (count($cek) > 0) {

            $acc = DB::table('tb_surat_tugas')
            ->where('id_st',$request->id)
            ->update([
              'status_pengajuan' => 2,
              'no_surat' => $request->no_surat
            ]);

            if ($acc) {
                session()->flash('success', 'Disetujui');
                return redirect()->route('approval.index');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect()->route('approval.index');
            }

        
        }else{
            session()->flash('error', 'Gagal Meminta Request');
            return redirect()->route('approval.index');
        }

        
   }

   function approval_terima2(Request $request){
     
        $cek =  DB::table('tb_surat_keterangan')
                  ->where('id_ket',$request->id)
                  ->get();
        if (count($cek) > 0) {

            $acc = DB::table('tb_surat_keterangan')
            ->where('id_ket',$request->id)
            ->update([
              'status_ket' => 2,
              'no_surat' => $request->no_surat
            ]);

            if ($acc) {
                session()->flash('success', 'Disetujui');
                return redirect()->route('approval.index');
            }else{
                session()->flash('error', 'Terjadi Kesalahan');
                return redirect()->route('approval.index');
            }

        
        }else{
            session()->flash('error', 'Gagal Meminta Request');
            return redirect()->route('approval.index');
        }

        
   }

   function approval_tolak($id){
         $qry =   DB::table('tb_surat_tugas')
                  ->where('id_st',$id)
                  ->update([
                    'status_pengajuan' => 0,
                    'diupdate_pada' => now()
                  ]);

        if ($qry) {
          session()->flash('success', 'Permintaan Ditolak');
          return redirect()->route('approval.index');
        }
   }

   function approval_tolak2($id){
         $qry =   DB::table('tb_surat_keterangan')
                  ->where('id_ket',$id)
                  ->update([
                    'status_ket' => 0,
                    'diupdate_pada' => now()
                  ]);

        if ($qry) {
          session()->flash('success', 'Permintaan Ditolak');
          return redirect()->route('approval.index');
        }
   }

   function riwayatapproval(){
    
   }



    function download_keterangan($id){

        $cek = DB::table('tb_surat_keterangan')->where('id_ket',$id)->first();

        $nis = $cek->nis;
        $nisn = $cek->nisn;
        $nama = $cek->nama_siswa;
        $kelas = $cek->kelas;
        $ttl = $cek->ttl;
        $jk = $cek->jk;
        $alamat = $cek->alamat;
        $no_surat = $cek->no_surat;

        $data=array(
            'no_surat' => $no_surat,
            'nis' => $nis,
            'nisn' => $nisn,
            'nama' => $nama,
            'kelas' => $kelas,
            'ttl' => $ttl,
            'jk' => $jk,
            'alamat' => $alamat,
            'tanggal' => $tanggalid=\Carbon\Carbon::parse(now())->translatedFormat('l / d F Y')

        );

/*      $pdf = PDF::loadview('cetak.surattugas',$data);
*/      return view('cetak.suratketerangan',$data);

   }

    function download_surattugas($id){

        $cek = DB::table('tb_surat_tugas')->where('id_st',$id)->first();

        $nama_lengkap = $cek->nama_guru;
        $nip = $cek->nip;
        $pangkat = $cek->pangkat;
        $jabatan = $cek->jabatan;
        $no_surat = $cek->no_surat;
        $nama_kegiatan = $cek->nama_kegiatan;
        $tempat = $cek->tempat;
        $tanggal = date('D / d F Y', strtotime($cek->tanggal));
        $jam = $cek->jam;

        $tanggalid=\Carbon\Carbon::parse($cek->tanggal)->translatedFormat('l / d F Y');


        $data=array(
            'no_surat' => $no_surat,
            'nama_lengkap' => $nama_lengkap,
            'nip' => $nip,
            'pangkat' => $pangkat,
            'jabatan' => $jabatan,
            'unit_kerja' => 'SEKOLAH MENENGAH ATAS NEGERI 1 CIKEMBAR',
            'nama_kegiatan' => $nama_kegiatan,
            'tanggal' => $tanggalid,
            'jam' => $jam,
            'tempat' => $tempat,

        );

        return view('cetak.surattugas',$data);
    }
}
