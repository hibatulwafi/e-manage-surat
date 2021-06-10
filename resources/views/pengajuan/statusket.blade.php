@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengajuan Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Status</a></li>
                        <li class="breadcrumb-item active">Data Pengajuan</li>
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
                      
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-bordered  table-hover" id="myTable">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($no=1)
                                    @forelse($table as $row)
                                        <tr>
                                            <td width="5%" class="text-center">{{$no++}}</td>
                                            <td>{{$row->nama_siswa }}</td>
                                            <td>{{date_format(date_create($row->dibuat_pada),"d, M Y") }}</td>
                                            <td class="text-center">
                                              @if($row->status_ket == 0)
                                                <span class="badge badge-danger">Ditolak</span>
                                              @elseif($row->status_ket == 1)
                                                <span class="badge badge-info">Menunggu</span>
                                              @elseif($row->status_ket == 2)
                                                <span class="badge badge-warning">Disetujui</span>
                                              @else
                                                <span class="badge badge-danger">Error</span>
                                              @endif
                                            </td>
                                            <td class="text-center">
                                              @if($row->status_ket == 0)
                                                <a href="#"  onclick="notif()" class="btn btn-secondary btn-sm"><i class="fas fa-download"></i> &nbsp; Download</a>
                                              @elseif($row->status_ket == 1)
                                                <a href="#"  onclick="notif()" class="btn btn-secondary btn-sm"><i class="fas fa-download"></i> &nbsp; Download</a>
                                              @elseif($row->status_ket == 2)
                                                <a href="{{route('download.keterangan', ['id' => $row->id_ket])}}" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-download" ></i> &nbsp; Download</a>
                                              @else
                                                <a href="#" class="badge badge-danger">Error</a>
                                              @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Data Tidak Ada</td>
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
@endsection

@section('scripts')
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
    <script>
     function notif() {
            $(document).ready(function () {
            toastr["info"]('Download Tidak Tersedia')
            });
        }
    </script>

@endsection
