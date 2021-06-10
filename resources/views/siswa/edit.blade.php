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
                        <li class="breadcrumb-item active">Edit Siswa</li>
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
                            
                            <span>Form Edit Siswa</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('siswa.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Baris 1-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" id="nis" value="{{ $qry->nis }}"  placeholder="NIS" readonly>
                                    @error('nis')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" value="{{ $qry->nisn }}"  placeholder="NISN" readonly>
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
                                   <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" id="nama_siswa" value="{{ $qry->nama_siswa }}"  placeholder="Nama Siswa" autofocus>
                                    @error('nama_siswa')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="jk">Gender</label>
                                    <select name="jk" class="form-control">
                                       <option value="Laki - Laki" @if($qry->jk == "Laki - Laki") selected @endif >Laki - Laki</option>
                                       <option value="Perempuan"  @if($qry->jk == "Perempuan") selected @endif >Perempuan</option>
                                    </select> 
                                    @error('jk')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1"></div>

                            <!-- Baris 3-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                   <label for="tempat_lahir">Tempat Lahir</label>
                                   <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" value="{{$qry->ttl}}"  placeholder="Tempat Lahir" autofocus>
                                    @error('tempat_lahir')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="no_telepon">No Telp</label>
                                    <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="no_telepon" value="{{$qry->no_telepon}}"  placeholder="0858 1234 1234" autofocus>
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
                                    <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" name="alamat_lengkap" id="alamat_lengkap" rows="3">{{ $qry->alamat_lengkap }}</textarea>
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
@section('scripts')
<script>
    
        $(document).ready(function () {
            $('#kategori_id').select2()

        });

</script>
@endsection
