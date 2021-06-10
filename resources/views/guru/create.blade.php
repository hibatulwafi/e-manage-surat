@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Guru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Guru</a></li>
                        <li class="breadcrumb-item active">Create Guru</li>
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
                            
                            <a href="{{ route('guru.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            
                            <span>Form Tambah Guru</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('guru.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <!-- Baris 1-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" value="{{ old('nip') }}"  placeholder="NIP" autofocus>
                                    @error('nip')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{ old('nik') }}"  placeholder="NIK" autofocus>
                                    @error('nik')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>

                            <!-- Baris 2-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                <label for="nama_guru">Nama</label>
                                   <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" name="nama_guru" id="nama_guru" value="{{ old('nama_guru') }}"  placeholder="Nama Guru" autofocus>
                                    @error('nama_guru')
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

                            <!-- Baris 2-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="pangkat">Pangkat</label>
                                    <input type="text" class="form-control @error('pangkat') is-invalid @enderror" name="pangkat" id="pangkat" value="{{ old('pangkat') }}"  placeholder="Pangkat" autofocus>
                                    @error('pangkat')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" value="{{ old('jabatan') }}"  placeholder="Jabatan" autofocus>
                                    @error('jabatan')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>

                            <!-- Baris 4-->
                            <div class="col-md-1"></div>
                           
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

                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="unit_kerja">Unit Kerja</label>
                                    <input type="text" class="form-control @error('unit_kerja') is-invalid @enderror" name="unit_kerja" id="unit_kerja" value="Sekolah Menengah Atas Negeri 1 Cikembar"  placeholder="Sekolah Menengah Atas Negeri 1 Cikembar" autofocus>
                                    @error('unit_kerja')
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
                            <div class="col-md-10 px-3">
                                <div class="form-group">
                                    <label for="alamat_lengkap">Alamat Lengkap</label>
                                    <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" name="alamat_lengkap" id="alamat_lengkap" rows="3">{{ old('alamat_lengkap') }}</textarea>
                                    @error('alamat_lengkap')
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                  </div>
                                  <div class="form-group d-flex justify-content-end">
                                    <a class="btn btn-default " href="{{ route('guru.index') }}">Batal</a>
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
