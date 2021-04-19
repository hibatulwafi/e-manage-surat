@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Rak</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('rak.index') }}">Rak</a></li>
                        <li class="breadcrumb-item active">Edit Rak</li>
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
                            
                            <a href="{{ route('rak.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            
                            <span>Form Edit Rak</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('rak.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="kode_rak">Kode Rak</label>
                                    <!-- Primary Key -->
                                    <input type="hidden" name="id_rak"  value="{{ $qry->id_rak }}">
                                    <input type="text" class="form-control @error('kode_rak') is-invalid @enderror" name="kode_rak" id="kode_rak" value="{{ $qry->kode_rak }}"  placeholder="Kode Rak" autofocus>
                                    @error('kode_rak')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="nama_rak">Nama Rak</label>
                                    <input type="text" class="form-control @error('nama_rak') is-invalid @enderror" name="nama_rak" id="nama_rak" value="{{$qry->nama_rak}}"  placeholder="Nama Rak" autofocus>
                                    @error('nama_rak')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-10 px-3">
                                <div class="form-group">
                                    <label for="keterangan_rak">Keterangan</label>
                                    <textarea class="form-control @error('keterangan_rak') is-invalid @enderror" name="keterangan_rak" id="keterangan_rak" rows="3">{{ $qry->keterangan_rak }}</textarea>
                                    @error('keterangan_rak')
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                  </div>
                                  <div class="form-group d-flex justify-content-end">
                                    <a class="btn btn-default " href="{{ route('rak.index') }}">Batal</a>
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
