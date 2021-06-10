<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public $keyword = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::latest()->with('roles');

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;
            
            $users = $users->where('name','like',"%".$this->keyword."%");
            $users = $users->orWhere('email','like',"%".$this->keyword."%");

            $users = $users->orWhereHas('roles', function ($query) {
                $query->where('name', 'like', "%".$this->keyword."%");
            });
            
        }
        
        return view('users.index')->with('users', $users->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('users.create', compact('roles'));
    }

    public function getuser(Request $request){

        if ($request->id == "siswa") {
            $data['user'] = DB::table ('tb_siswa')->get(["nis as id","nama_siswa as name"]);
        }elseif ($request->id == "guru"){
            $data['user'] = DB::table ('tb_guru')->get(["nip as id","nama_guru as name"]);
        }
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
       $cekrole = DB::table('roles')->where('name','=',$request->role)->first();

       $cekuser=DB::table('users')->select(DB::raw('MAX(id) as kd_max'));
       if($cekuser->count()>0){
            foreach($cekuser->get() as $k){
                $id = $k->kd_max+1;
            }
       }else{
        $id = "1";
       }

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required',
            'profile' => 'required'
        ]);

        $user = User::firstOrCreate([
            'email' => $request->email
        ], [
            'id' => $id,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'status' => true
        ]);

        $user->assignRole($request->role);

        DB::table('tb_login')->insert([
            'id_user' => $id,
            'id_role' => $cekrole->id,
            'id_profil' => $request->profile,
            ]);

        session()->flash('success', "Data User : $user->name Berhasil Ditambahkan");

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        

        $roles = Role::orderBy('name', 'ASC')->get();
        return view('users.edit')
                ->with('roles', $roles)
                ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        // return $user->id;
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'sometimes|nullable|confirmed|min:6',
        ]);

        $password = !empty($request->password) ? bcrypt($request->password) : $user->password;
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'status' => $request->status,
        ]);

        $user->syncRoles([$request->input('role')]);

        session()->flash('success', "Data User : $user->name Berhasil Diubah");

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->hasRole('admin')){
            session()->flash('error', "Data dengan Role Admin tidak bisa dihapus!");
        }else{
            $user->delete();
    
            session()->flash('success', "Data User : $user->name Berhasil Dihapus");
        }

        return redirect(route('users.index'));
    }
}
