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
                        <form method="POST" target="_blank" action="{{ route('post.keterangan') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">

                        <div class="col-12">
                            <span class="text-secondary"> <h4> <br/><center>PILIH SISWA</center> </h4></span>
                        </div>

                           <div class="col-md-1"></div>
                            <div class="col-md-10">
                            <table width="100%">
                            <tr> <td>
                                <div class="form-group">
                                     <select name="siswa" id="siswa" class="form-control @error('siswa') is-invalid @enderror">
                                        <option value="" disabled="" selected="">-Pilih Siswa-</option>
                                        @foreach ($siswa as $item)
                                        <option value="{{ $item->nis  }}"
                                                @if ($item->nis == old('nis'))
                                                    selected
                                                @endif    
                                            >
                                            {{ $item->nis }} - {{ $item->nama_siswa }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td></tr>
                            </table>
                            </div>
                            <div class="col-md-1"></div>

                          <div class="col-md-1"></div>
                            <div class="col-md-10">
                            <div class="form-group">
                                <label for="nis">No Surat</label>
                                   <input type="text" class="form-control @error('no_surat') is-invalid @enderror" name="no_surat" id="no_surat"  placeholder="no_surat" value="422/002/SMAN1.CADISDIK WILV/2021" autofocus>
                                    @error('nis')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1"></div>


                        <div class="col-12">
                            <hr>
                            <span class="text-secondary"> <h4> <br/><center>IDENTITAS</center> </h4></span>
                            <hr>
                        </div>
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
                                <label for="nama">Nama</label>
                                   <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}"  placeholder="Nama Siswa" autofocus>
                                    @error('nama')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" id="kelas" value="{{ old('kelas') }}"  placeholder="Kelas" autofocus>
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
                                   <input type="text" class="form-control @error('ttl') is-invalid @enderror" name="ttl" id="ttl" value="{{ old('ttl') }}"  placeholder="Tempat Tanggal Lahir" autofocus>
                                    @error('ttl')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 px-3">

                                <div class="form-group">
                                    <label for="jk">Gender</label>
                                    <input type="text" class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk" value="{{ old('jk') }}"  placeholder="Gender" autofocus>
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
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="2">{{ old('alamat') }}</textarea>
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
