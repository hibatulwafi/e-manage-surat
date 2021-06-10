@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat Surat Keterangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Buat</a></li>
                        <li class="breadcrumb-item"><a href="#">Surat</a></li>
                        <li class="breadcrumb-item active">Surat Keterangan</li>
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
                            
                        
                            <span class="text-secondary">*Surat yang dibuat adalah surat resmi</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <form method="POST"  action="{{ route('pengajuan.keterangan.post') }}" enctype="multipart/form-data">
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
                                <label for="nis">NIS</label>
                                   <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" id="nis" value="{{$detail->nis}}"  placeholder="NIS" autofocus readonly="">
                                    @error('nis')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" value="{{$detail->nisn}}"  placeholder="NISN" autofocus readonly="">
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
                                <label for="nama">Nama</label>
                                   <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{$detail->nama_siswa}}"  placeholder="Nama Siswa" autofocus>
                                    @error('nama')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" id="kelas" value="{{$detail->kelas}}"  placeholder="Kelas" autofocus>
                                    @error('kelas')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>

                              <!-- Baris 3-->
                            <div class="col-md-1"></div>
                            <div class="col-md-5 px-3">
                                <div class="form-group">
                                <label for="ttl">TTL</label>
                                   <input type="text" class="form-control @error('ttl') is-invalid @enderror" name="ttl" id="ttl" value="{{$detail->ttl}}"  placeholder="Tempat Tanggal Lahir" autofocus>
                                    @error('ttl')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="jk">Gender</label>
                                    <input type="text" class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk" value="{{$detail->jk}}"  placeholder="Gender" autofocus>
                                    @error('jk')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-1"></div>

                            <div class="col-md-1"></div>
                            <div class="col-md-10 px-3">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="2">{{$detail->alamat_lengkap}}</textarea>
                                    @error('alamat')
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                  </div>
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
            $('#siswa').select2()
        });

           $('#siswa').change(function() {
             var id = $(this).val();
             var url = '{{ route("getSiswa", ":id") }}';
             url = url.replace(':id', id);

             $.ajax({
                 url: url,
                 type: 'get',
                 dataType: 'json',
                 success: function(response) {
                     if (response != null) {
                         $('#nis').val(response.nis);
                         $('#nisn').val(response.nisn);
                         $('#nama').val(response.nama_siswa);
                         $('#kelas').val(response.kelas);
                         $('#ttl').val(response.ttl);
                         $('#jk').val(response.jk);
                         $('#alamat').val(response.alamat_lengkap);
                     }
                 }
             });
         });

</script>
@endsection
