@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengajuan Pembuatan Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
                        <li class="breadcrumb-item"><a href="#">Surat</a></li>
                        <li class="breadcrumb-item active">Surat Tugas</li>
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
                            
                         
                            <span class="text-secondary">*Surat yang dibuat adalah surat resmi, dengan persetujuan atasan untuk melaksanakan tugas tertentu</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST" action="{{ route('pengajuan.surattugas.post') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                        <div class="col-12">
                            <span class="text-secondary"> <h4> <br/><center>IDENTITAS</center> </h4></span>
                            <hr>
                        </div>
                            <!-- Baris 1-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                <label for="nama_lengkap">Nama</label>
                                   <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="nama_lengkap" value="{{ $detail->nama_guru }}"  placeholder="Nama Lengkap" autofocus>
                                    @error('nama_lengkap')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" value="{{ $detail->nip }}"  placeholder="NIP" autofocus readonly>
                                    @error('nip')
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
                                   <input type="text" class="form-control @error('pangkat') is-invalid @enderror" name="pangkat" id="pangkat" value="{{ $detail->pangkat }}"  placeholder="Pangkat" autofocus>
                                    @error('pangkat')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" value="{{ $detail->jabatan }}"  placeholder="Jabatan" autofocus>
                                    @error('jabatan')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>
                         <div class="col-12">
                            <span class="text-secondary"> <br/><br/><h4> <center>KEGIATAN</center> </h4></span>
                            <hr>
                        </div>
                            <!-- Baris 3-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                <label for="nama_kegiatan">Nama Kegiatan</label>
                                   <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" id="nama_kegiatan" value="{{ old('nama_kegiatan') }}"  placeholder="Nama Kegiatan" autofocus>
                                    @error('nama_kegiatan')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="tempat">Tempat</label>
                                    <input type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" id="tempat" value="{{ old('tempat') }}"  placeholder="Tempat" autofocus>
                                    @error('tempat')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>

                            <!-- Baris 4-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                   <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d'); ?>"  placeholder="" autofocus>
                                    @error('tanggal')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="jam">Jam</label>
                                    <input type="time" class="form-control @error('jam') is-invalid @enderror" name="jam" id="jam" value="08:00"  placeholder="Nama Customer" autofocus>
                                    @error('jam')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>



                            <!-- Baris 4-->
                            <div class="col-md-1"></div>
                            <div class="col-md-10 px-3">
                                  <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary ml-2">
                                        Buat
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
            $('#guru').select2()
        });


           $('#guru').change(function() {
             var id = $(this).val();
             var url = '{{ route("getGuru", ":id") }}';
             url = url.replace(':id', id);

             $.ajax({
                 url: url,
                 type: 'get',
                 dataType: 'json',
                 success: function(response) {
                     if (response != null) {
                         $('#nip').val(response.nip);
                         $('#nama_lengkap').val(response.nama_guru);
                         $('#jabatan').val(response.jabatan);
                         $('#pangkat').val(response.pangkat);
                     }
                 }
             });
         });

</script>

<script>
    $(document).ready(function () {
        $('.dropify').dropify();
    });

</script>
@if(session()->has('success'))
    <script>
        $(document).ready(function () {
            toastr["success"]('{{ session()->get('success') }}')
        });

    </script>
@endif

@if(session()->has('error'))
    <script>
        $(document).ready(function () {
            toastr["info"]('{{ session()->get('error') }}')
        });
    </script>
@endif
@endsection

