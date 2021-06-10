@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                        {{-- <li class="breadcrumb-item active">Blank Page</li> --}}
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if( ucfirst(Auth::user()->roles[0]->name) == "Admin")
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $rak }}</h3>

                        <p>Data Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('rak.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $arsip->count() }}</h3>

                        <p>Data Guru</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('surat.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $users->count() }}</h3>

                        <p>Total Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>12</h3>

                        <p>Pengajuan Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <a href="{{ route('history.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Log Aktifitas</h3>

                        <div class="card-tools small">
                            <a href="{{ route('surat.index') }}">Selengkapnya</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 235px;">
                        <table class="table table-head-fixed text-nowrap small">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Akun</th>
                                    <th>Aktifitas</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no=1)
                                @foreach ($arsip as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>Sopyan Maulana</td>
                                        <td>Login Ke Aplikasi</td>
                                        <td>{{ date('H:i d-M-Y', strtotime($row->created_at))}}</td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col-md -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pengajuan</h3>

                        <div class="card-tools small">
                            <a href="{{ route('users.index') }}">Selengkapnya</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 235px;">
                        <table class="table table-head-fixed text-nowrap small">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Surat</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <td>Andi Rahmat</td>
                                    <td>Surat Keterangan Siswa</td>
                                    <td>10:57 27-Apr-2021</td>
                                </tr> 
                                 <tr>
                                    <td>Firda Mutia</td>
                                    <td>Surat Keterangan Siswa</td>
                                    <td>12:21 27-Apr-2021</td>
                                </tr> 
                                 <tr>
                                    <td>Andi Rahmat</td>
                                    <td>Surat Tugas</td>
                                    <td>02:57 25-Apr-2021</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col-md -->
        </div>
        @endif

        @if( ucfirst(Auth::user()->roles[0]->name) == "Siswa" || ucfirst(Auth::user()->roles[0]->name) == "Guru" )
            <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $rak }}</h3>

                        Total Permohonan<br/>Pembuatan Surat
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <a href="{{ route('rak.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>0</h3>
                        Menunggu<br/>Sedang Proses
                    </div>
                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <a href="{{ route('surat.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Permohonan Pembuatan Surat</h3>

                        <div class="card-tools small">
                            <a href="{{ route('surat.index') }}">Selengkapnya</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap small">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no=1)
                                 <tr>
                                        <td>{{$no++}}</td>
                                        <td>Sopyan Maulana</td>
                                        <td>Surat Tugas</td>
                                        <td>14:00 19-Apr-2021</td>
                                        <td><a href="#" class="btn btn-sm btn-info" style="width: 100px;">Menunggu</a></td>
                                    </tr> 
                                @foreach ($arsip as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>Sopyan Maulana</td>
                                        <td>Surat Tugas</td>
                                        <td>{{ date('H:i d-M-Y', strtotime($row->created_at))}}</td>
                                        <td><a href="#" class="btn btn-sm btn-success" style="width: 100px;">Selesai</a></td>
                                    </tr> 
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col-md -->
        </div>
        @endif

    </section>
    <!-- /.content -->
</div>
@endsection
