<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class PeminjamanController extends Controller
{
    function transaksi(){
        $data=array(
            'table' =>DB::table('tb_peminjaman')
            ->join('tb_arsip','tb_peminjaman.id_arsip','tb_arsip.id_arsip')
            ->join('users','tb_peminjaman.id_petugas','users.id')
            ->get(),
        );
        return view('transaksi.index',$data);
    }
    function transaksi_create(){
        $data=array(
            'arsip' =>DB::table('tb_arsip')->get(),
        );
        return view('transaksi.create',$data);
    }

    function transaksi_store(Request $request){
     /* echo "ID Arsip : ";
      echo $request->id_arsip ."<br/>";
      echo "nama_peminjam : ";
      echo $request->nama_peminjam ."<br/>";
      echo "date range : ";
      echo $request->daterange ."<br/>";
      echo "ID User : ";
      echo Auth::user()->id ."<br/>";
      echo "Start : ";
      echo substr($request->daterange, 0,10) ."<br/>";
      echo "End : ";
      echo substr($request->daterange, 12) ."<br/>";*/


      $substrpinjam = substr($request->daterange, 0,10);
      $substrpinjamtglkembali = substr($request->daterange, 12);

      $start = strtotime($substrpinjam);
      $end = strtotime($substrpinjamtglkembali);

      $tglpinjam = date('Y-m-d',$start);
      $tglkembali = date('Y-m-d',$end);

      DB::table('tb_peminjaman')->insert([
            'tanggal_peminjaman' => $tglpinjam,
            'tanggal_kembali' => $tglkembali,
            'id_arsip' => $request->id_arsip,
            'nama_peminjam' => $request->nama_peminjam,
            'id_petugas' => Auth::user()->id,
            'status_peminjaman' => 1,
            'created_at' => now()
            ]);


      session()->flash('success', 'Peminjaman Berhasil');
      return redirect(route('transaksi.index'));

    }


    function approval(){
         $data=array(
            'table' =>DB::table('tb_peminjaman')
            ->join('tb_arsip','tb_peminjaman.id_arsip','tb_arsip.id_arsip')
            ->join('users','tb_peminjaman.id_petugas','users.id')
            ->where('status_peminjaman',1)
            ->get(),
        );
        return view('approval.index',$data);
    }

    function approval_terima($id){
         $qry =   DB::table('tb_peminjaman')
                  ->where('id_peminjaman',$id)
                  ->update([
                    'status_peminjaman' => 2,
                    'updated_at' => now()
                  ]);

        if ($qry) {
          session()->flash('success', 'Peminjaman Disetujui');
          return redirect()->route('approval.index');
        }
   }

   function approval_tolak($id){
         $qry =   DB::table('tb_peminjaman')
                  ->where('id_peminjaman',$id)
                  ->update([
                    'status_peminjaman' => 0,
                    'updated_at' => now()
                  ]);

        if ($qry) {
          session()->flash('success', 'Peminjaman Disetujui');
          return redirect()->route('approval.index');
        }
   }

    function history(){
        $data=array(
            'table' =>DB::table('tb_peminjaman')
            ->join('tb_arsip','tb_peminjaman.id_arsip','tb_arsip.id_arsip')
            ->join('users','tb_peminjaman.id_petugas','users.id')
            ->where('status_peminjaman',3)
            ->get(),
        );
        return view('history.index',$data);
    }

}
