@extends('layouts.main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layouts.sidebar')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>e-Attendance</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Boutique</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div id="camera" style="display: none;"></div>
                        <form id="absenForm" method="POST" action="{{ route('boutique.presence.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nik" class="form-control" id="nik"
                                            required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password" class="form-control" id="password"
                                            required>
                                    </div>
                                </div>
                                <input type="hidden" name="image" id="image">
                                <button type="submit" class="btn btn-primary">Absen</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">NIK</th>
                                        <th>Nama</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Foto Masuk</th>
                                        <th>Foto Keluar</th>
                                        <th>Waktu Keterlambatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $displayedUsers = []; // Array untuk melacak NIK employe- yang sudah ditampilkan
                                    @endphp

                                    @foreach ($presences as $presence)
                                        @if (!in_array($presence->employee->nik, $displayedUsers))
                                            <tr class="align-middle">
                                                <td>{{ $presence->employee->nik }}</td>
                                                <td>{{ $presence->employee->name }}</td>
                                                <td>{{ $presence->in_presence_time }}</td>
                                                <td>{{ $presence->out_presence_time }}</td>
                                                <td>
                                                    <img src="{{ asset($presence->in_presence_photo) }}" alt=""
                                                        width="100" height="auto">
                                                </td>
                                                <td>
                                                    <img src="{{ asset($presence->out_presence_photo) }}" alt=""
                                                        width="100" height="auto">
                                                </td>
                                                <td>
                                                    {{ $presence->late_minutes }} menit
                                                </td>
                                            </tr>

                                            @php
                                                $displayedUsers[] = $presence->employee->nik; // Tambahkan NIK employe- ke array
                                            @endphp
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
