@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Surat</a></li>
                        <li class="breadcrumb-item active">Create Surat</li>
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
                            
                            <a href="{{ route('surat.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            
                            <span>Form Tambah Surat</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                        <!-- Baris 1-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="id_rak">Rak Surat</label>
                                    <select name="id_rak" id="id_rak" class="form-control @error('id_rak') is-invalid @enderror">
                                        <option value="" disabled="" selected="">-Pilih rak-</option>
                                        @foreach ($rak as $item)
                                        <option value="{{ $item->id_rak  }}"
                                                @if ($item->id_rak == old('id_rak'))
                                                    selected
                                                @endif    
                                            >
                                            {{ $item->nama_rak }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('id_rak')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="nama_surat">Nama</label>
                                    <input type="text" class="form-control @error('nama_surat') is-invalid @enderror" name="nama_surat" id="nama_surat" value="{{ old('nama_surat') }}"  placeholder="Nama Surat" autofocus>
                                    @error('nama_surat')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>

                            <!-- Baris 2-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                <label for="file">File</label>
                                   <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file" value="{{ old('file') }}" autofocus>
                                    @error('file')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="jenis_surat">Jenis</label>
                                    <select class="form-control @error('jenis_surat') is-invalid @enderror" name="jenis_surat">    
                                        <option>  Surat Masuk </option>
                                        <option>  Surat Keluar </option>
                                        <option>  Arsip </option>
                                    </select>
                                    @error('jenis_surat')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>

                            <!-- Baris 4-->
                            <div class="col-md-1"></div>
                            <div class="col-md-10 px-3">
                                <div class="form-group">
                                    <label for="keterangan_surat">Keterangan</label>
                                    <textarea class="form-control @error('keterangan_surat') is-invalid @enderror" name="keterangan_surat" id="keterangan_surat" rows="3">{{ old('keterangan_surat') }}</textarea>
                                    @error('keterangan_surat')
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                  </div>
                                  <div class="form-group d-flex justify-content-end">
                                    <a class="btn btn-default " href="{{ route('surat.index') }}">Batal</a>
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
            $('#id_rak').select2()
        });

</script>
@endsection
