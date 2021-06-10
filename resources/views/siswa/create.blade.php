@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
                        <li class="breadcrumb-item active">Create Siswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class=" d-flex align-items-center justify-content-between">
                            
                            <a href="{{ route('siswa.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            
                            <span>Form Tambah Siswa</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('siswa.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <!-- Baris 1-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" id="nis" value="{{ old('nis') }}"  placeholder="NIS" autofocus>
                                    @error('nis')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" value="{{ old('nisn') }}"  placeholder="NISN" autofocus>
                                    @error('nisn')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>

                            <!-- Baris 2-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                <label for="nama_siswa">Nama</label>
                                   <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa') }}"  placeholder="Nama Siswa" autofocus>
                                    @error('nama_siswa')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="jk">Gender</label>
                                    <select name="jk" class="form-control">
                                       <option value="Laki - Laki">Laki - Laki</option>
                                       <option value="Perempuan">Perempuan</option>
                                    </select> 
                                    @error('jk')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1"></div>

                            <!-- Baris 3-->
                            <div class="col-md-1"></div>
                            <div class="col-md-2 px-3">
                                <div class="form-group">
                                   <label for="tempat_lahir">Tempat Lahir</label>
                                   <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}"  placeholder="Tempat Lahir" autofocus>
                                    @error('tempat_lahir')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 px-3">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                   <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"  placeholder="" autofocus>
                                    @error('tanggal_lahir')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="no_telepon">No Telp</label>
                                    <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}"  placeholder="0858 1234 1234" autofocus>
                                    @error('no_telepon')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>

                            <!-- Baris 4-->
                            <div class="col-md-1"></div>
                            <div class="col-md-1 px-3">
                                <div class="form-group">
                                   <label for="kelas_1">Kelas</label>
                                   <select name="kelas_1" class="form-control">
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select> 
                                    @error('kelas_1')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2 px-3">
                                <div class="form-group">
                                    <label for="kelas_2">&nbsp;</label>
                                    <select name="kelas_2" class="form-control">
                                        <option value="MIPA">MIPA</option>
                                        <option value="IPS">IPS</option>
                                        <option value="BAHASA">BAHASA</option>
                                    </select> 
                                    @error('kelas_2')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2 px-3">
                                <div class="form-group">
                                    <label for="kelas_3">&nbsp;</label>
                                    <select name="kelas_3" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select> 
                                    @error('kelas_3')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control">
                                       <option value="Islam">Islam</option>
                                       <option value="Hindu">Hindu</option>
                                       <option value="Budha">Budha</option>
                                       <option value="Kristen Khatolik">Kristen Khatolik</option>
                                       <option value="Kristen Protestan">Kristen Protestan</option>
                                    </select> 
                                    @error('agama')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1"></div>


                            <!-- Baris 4-->
                            <div class="col-md-1"></div>
                            <div class="col-md-10 px-3">
                                <div class="form-group">
                                    <label for="alamat_lengkap">Alamat Lengkap</label>
                                    <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" name="alamat_lengkap" id="alamat_lengkap" rows="3">{{ old('alamat_lengkap') }}</textarea>
                                    @error('alamat_lengkap')
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                  </div>
                                  <div class="form-group d-flex justify-content-end">
                                    <a class="btn btn-default " href="{{ route('siswa.index') }}">Batal</a>
                                    <button type="submit" class="btn btn-primary ml-2">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                            <!-- /.col-md -->
                            <div class="col-md-1"></div>
                        </div>
                    </form>
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer clearfix">
                        tes
                    </div> --}}
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection
