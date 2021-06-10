<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class CetakController extends Controller
{
    
    public function surattugas()
    {
    	$pegawai = 1;
 
    	$pdf = PDF::loadview('cetak.surattugas',['pegawai'=>$pegawai]);
    	return $pdf->download('laporan-pegawai-pdf');
    }

    public function suratketerangan()
    {
    	$pegawai = 1;
 
    	$pdf = PDF::loadview('pegawai_pdf',['pegawai'=>$pegawai]);
    	return $pdf->download('laporan-pegawai-pdf');
    }
}
