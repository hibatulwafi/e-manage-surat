@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Approval</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Transaksi</a></li>
                        <li class="breadcrumb-item active">Approval</li>
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
                  
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <p><h5>Pengajuan Surat Tugas</h5></p>
                        <hr/>
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-bordered  table-hover" id="myTable">
                                <thead>
                                    <tr class="text-center">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>NIP </th>
                                            <th>Nama </th>
                                            <th>Kegiatan</th>
                                            <th>Waktu</th>
                                            <th>Tempat</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tr>
                                </thead>
                                 <tbody>
                                    @php($no=1)
                                    @forelse($table as $row)
                                        <tr>
                                            <td width="5%" class="text-center">{{$no++}}</td>
                                            <td>{{$row->nip }}</td>
                                            <td>{{$row->nama_guru }}</td>
                                            <td>{{$row->nama_kegiatan }}</td>
                                            <td>{{$row->jam }} - {{date_format(date_create($row->tanggal),"d, M Y") }}</td>
                                            <td>{{$row->tempat }}</td>
                                            <td class="text-center">
                                              @if($row->status_pengajuan == 0)
                                                <span class="badge badge-danger">Ditolak</span>
                                              @elseif($row->status_pengajuan == 1)
                                                <span class="badge badge-info">Menunggu</span>
                                              @elseif($row->status_pengajuan == 2)
                                                <span class="badge badge-success">Disetujui</span>
                                              @else
                                                <span class="badge badge-danger">Error</span>
                                              @endif
                                            </td>
                                            <td style="width: 20px">
                                                <a class="btn btn-success btn-sm" onclick="modalST('{{$row->id_st}}')">
                                                    <i class="fas fa-check"></i>
                                                    Terima
                                                </a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('approval.tolak', $row->id_st) }}">
                                                    <i class="fas fa-times"></i>
                                                    Tolak
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data Tidak Ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                 </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->


    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                  
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <p><h5>Pengajuan Surat Keterangan</h5></p>
                        <hr/>
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-bordered  table-hover" id="myTable">
                                <thead>
                                    <tr class="text-center">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>NIS </th>
                                            <th>Nama </th>
                                            <th>Kebutuhan </th>
                                            <th>Tanggal </th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tr>
                                </thead>
                                 <tbody>
                                    @php($no=1)
                                    @forelse($table2 as $row)
                                        <tr>
                                            <td width="5%" class="text-center">{{$no++}}</td>
                                            <td>{{$row->nis }}</td>
                                            <td>{{$row->nama_siswa }}</td>
                                            <td>{{$row->keterangan }}</td>
                                            <td> {{date_format(date_create($row->dibuat_pada),"H:i, d M Y") }}</td>
                                            <td class="text-center">
                                              @if($row->status_ket == 0)
                                                <span class="badge badge-danger">Ditolak</span>
                                              @elseif($row->status_ket == 1)
                                                <span class="badge badge-info">Menunggu</span>
                                              @elseif($row->status_ket == 2)
                                                <span class="badge badge-success">Disetujui</span>
                                              @else
                                                <span class="badge badge-danger">Error</span>
                                              @endif
                                            </td>
                                            <td style="width: 20px">
                                                <a class="btn btn-success btn-sm" onclick="modalSK('{{$row->id_ket}}')">
                                                    <i class="fas fa-check"></i>
                                                    Terima
                                                </a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('approvalket.tolak', $row->id_ket) }}">
                                                    <i class="fas fa-times"></i>
                                                    Tolak
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data Tidak Ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                 </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<!-- Modal Surat Tugas-->
<div class="modal fade" id="modalST" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Terima Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="deleteForm">
            @csrf
                <div class="modal-body">
                    No Surat
                    <input type="text" name="no_surat" value="800/000/SMAN1.CADISDIK WILV/2021" class="form-control">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success">Ya, Terima</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Surat Keterangan-->
<div class="modal fade" id="modalSK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Terima Pengajuan - Surat Keterangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="approveForm">
            @csrf
                <div class="modal-body">
                    No Surat
                    <input type="text" name="no_surat" value="422/000/SMAN1.CADISDIK WILV/2021" class="form-control">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success">Ya, Terima</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Import File-->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Import Data transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="import_transaksi">Import File</label>
                      <input type="file" class="form-control-file" name="import_transaksi" id="import_transaksi" placeholder="" aria-describedby="fileHelpId" required>
                      <small id="fileHelpId" class="form-text text-muted">Tipe file : xls, xlsx</small>
                      <small id="fileHelpId" class="form-text text-muted">Pastikan file upload sesuai format. <br> <a href="{{ url('template/transaksi_template.xlsx') }}">Download contoh format file xlsx <i class="fas fa-download ml-1   "></i></a></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                {{-- <form action="" method="POST" id="deleteForm">
                    @method('DELETE')
                    @csrf --}}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {{-- </form> --}}
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function modalST(id) {
        let form = document.getElementById('deleteForm')
        form.action = `./terima/approval/${id}`
        console.log(form)
        $('#modalST').modal('show')
    }

    function modalSK(id) {
        let form = document.getElementById('approveForm')
        form.action = `./terima/approvalket/${id}`
        console.log(form)
        $('#modalSK').modal('show')
    }

</script>

@error('import_transaksi')
    {{-- <div class="text-danger small mt-1">{{ $message }}</div> --}}
    <script>
        $(document).ready(function () {
            toastr["error"]('{{ $message }}')
        });
    </script>
@enderror

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
