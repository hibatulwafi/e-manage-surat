@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Peminjaman</a></li>
                        <li class="breadcrumb-item active">Create Transaksi</li>
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
                            
                            <a href="{{ route('transaksi.index')}}" class="btn">
                                <i class="fas fa-arrow-left  text-purple  "></i>
                            </a>
                            
                            <span>Form Transaksi</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-1"></div>
                           

                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="id_arsip">Arsip</label>
                                    <select name="id_arsip" id="id_arsip" class="form-control @error('id_arsip') is-invalid @enderror">
                                        <option value="" disabled="" selected="">-Pilih Arsip-</option>
                                        @foreach ($arsip as $item)
                                        <option value="{{ $item->id_arsip  }}"
                                                @if ($item->id_arsip == old('id_arsip'))
                                                    selected
                                                @endif    
                                            >
                                            {{ $item->nama_arsip }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('id_arsip')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="nama_peminjam">Nama</label>
                                    <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" name="nama_peminjam" id="nama_peminjam" value="{{ old('nama_peminjam') }}"  placeholder="Nama Peminjam" autofocus>
                                    @error('nama_peminjam')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-10 px-3">

                               <div class="form-group">
                                    <label for="daterange">Tanggal Pinjam - Kembali</label>
                                    <input type="text"  class="form-control @error('daterange') is-invalid @enderror" name="daterange" value="01/04/2021 - 02/04/2021" />
                                </div>


                                  <div class="form-group d-flex justify-content-end">
                                    <a class="btn btn-default " href="{{ route('transaksi.index') }}">Batal</a>
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


$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});


</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection
