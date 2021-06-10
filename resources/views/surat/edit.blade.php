@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Arsip</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('arsip.index') }}">Arsip</a></li>
                        <li class="breadcrumb-item active">Edit Arsip</li>
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
                            
                            <a href="{{ route('arsip.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            
                            <span>Form Edit Arsip</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('arsip.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <!-- Baris 1 -->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="id_rak">Kategori</label>
                                    <!-- Primarykey -->
                                    <input type="hidden" name="id_arsip"  value="{{ $qry->id_arsip }}">

                                    <select name="id_rak" id="id_rak" class="form-control @error('id_rak') is-invalid @enderror">
                                        <option value="" disabled="" selected="">-Pilih rak-</option>
                                        @foreach ($rak as $item)
                                        <option value="{{ $item->id_rak  }}"
                                                @if ($item->id_rak == $cek_rak->id_rak )
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
                                    <label for="nama_arsip">Nama Arsip</label>
                                    <input type="text" class="form-control @error('nama_arsip') is-invalid @enderror" name="nama_arsip" id="nama_arsip" value="{{$qry->nama_arsip}}"  placeholder="Nama Arsip" autofocus>
                                    @error('nama_arsip')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>


                            <!-- Baris 2-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                <label for="no_polis">No Polis</label>
                                   <input type="text" class="form-control @error('no_polis') is-invalid @enderror" name="no_polis" id="no_polis" value="{{ $qry->no_polis }}"  placeholder="No Polis" autofocus>
                                    @error('no_polis')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="no_kontrak">No Kontrak</label>
                                    <input type="text" class="form-control @error('no_kontrak') is-invalid @enderror" name="no_kontrak" id="no_kontrak" value="{{ $qry->no_kontrak }}"  placeholder="No Kontrak" autofocus>
                                    @error('no_kontrak')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>

                            <!-- Baris 3-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="tanggal_valid">Tanggal Valid</label>
                                   <input type="date" class="form-control @error('tanggal_valid') is-invalid @enderror" name="tanggal_valid" id="tanggal_valid" value="{{ $qry->tanggal_valid }}"  placeholder="" autofocus>
                                    @error('tanggal_valid')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="nama_customer">Customer</label>
                                    <input type="text" class="form-control @error('nama_customer') is-invalid @enderror" name="nama_customer" id="nama_customer" value="{{ $qry->nama_customer }}"  placeholder="Nama Customer" autofocus>
                                    @error('nama_customer')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>
                            <!-- Baris 4 -->
                            <div class="col-md-1"></div>
                            <div class="col-md-10 px-3">
                                <div class="form-group">
                                    <label for="keterangan_arsip">Keterangan</label>
                                    <textarea class="form-control @error('keterangan_arsip') is-invalid @enderror" name="keterangan_arsip" id="keterangan_arsip" rows="3">{{ $qry->keterangan_arsip }}</textarea>
                                    @error('keterangan_arsip')
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                  </div>
                                  <div class="form-group d-flex justify-content-end">
                                    <a class="btn btn-default " href="{{ route('arsip.index') }}">Batal</a>
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
