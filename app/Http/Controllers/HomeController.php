<?php

namespace App\Http\Controllers;

use App\Produk;
use App\User;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $rak = DB::table('tb_rak')->count();
        $arsip = DB::table('tb_arsip')->join('tb_rak','tb_rak.id_rak','tb_arsip.id_rak')
                 ->select('tb_arsip.*','tb_rak.kode_rak')->limit(5)->get();

        return view('home', compact('rak', 'users', 'arsip'));
    }
}
