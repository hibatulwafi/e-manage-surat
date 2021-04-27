@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('peminjaman.user') }}">Peminjaman</a></li>
                        <li class="breadcrumb-item active">Peminjaman Baru</li>
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
                            <span>Form Peminjaman <br/> * <a class="text-secondary">Pilih arsip yang ingin di pinjam</a></span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" >
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-bordered  table-hover" id="myTable">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Polis</th>
                                        <th>No Kontrak</th>
                                        <th>Valid</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($no=1)
                                    @forelse($arsip as $row)
                                        <tr>
                                            <td width="5%" class="text-center">{{$no++}}</td>
                                            <td>{{$row->nama_arsip }}</td> 
                                            <td>{{$row->no_polis }}</td>
                                            <td>{{$row->no_kontrak }}</td>
                                            <td>{{date_format(date_create($row->tanggal_valid),"d, M Y") }}</td>
                                            <td>{{$row->nama_customer }}</td>
                                            <td class="text-center">
                                              @if($row->status_arsip == 0)
                                                <span class="badge badge-danger">archieved</span>
                                              @elseif($row->status_arsip == 1)
                                                <span class="badge badge-success">Ready</span>
                                              @elseif($row->status_arsip == 2)
                                                <span class="badge badge-info">Dipinjam</span>
                                              @else
                                                <span class="badge badge-danger">Error</span>
                                              @endif
                                            </td>
                                            <td style="width: 20px">
                                             @if($row->status_arsip == 1)
                                                <a class="btn btn-sm btn-success" href="#"
                                                    onclick="handleDelete ({{ $row->id_arsip }})">
                                                    <i class="fas fa-folder-open   "></i>
                                                    Pinjam
                                                </a>
                                             @endif

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Data Tidak Ada</td>
                                        </tr>
                                    @endforelse
    
                                </tbody>
                            </table>
                      </div>
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

<!-- Modal Pinjam-->
<div class="modal fade" id="pinjamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pinjamModalLabel">Pinjam Arsip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mt-3">Apakah kamu meminjam arsip ini?</p>
            </div>
            <div class="modal-footer">
                <form action="" method="POST" id="pinjamForm">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak, Kembali</button>
                    <button type="submit" class="btn btn-danger">Ya, Pinjam</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    
        $(document).ready(function () {
            $('#id_arsip').select2()
        });

        $(document).ready(function () {
            $('#nama_peminjam').select2()
        });

</script>
<script>
    function handleDelete(id) {
        let form = document.getElementById('pinjamForm')
        form.action = `./pinjam/${id}`
        console.log(form)
        $('#pinjamModal').modal('show')
    }

</script>

@endsection
