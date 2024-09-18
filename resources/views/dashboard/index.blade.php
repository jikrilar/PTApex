@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard PT Apex Mitra Malindo</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah store, office, <br> warehouse</span>
                                <span class="info-box-number">{{ $locationTotal }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Keseluruhan <br>Karyawan</span>
                                <span class="info-box-number">{{ $employeeTotal }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total <br> Department</span>
                                <span class="info-box-number">
                                    {{ $departmentTotal }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-id-card"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah Kehadiran <br> Hari Ini</span>
                                <span class="info-box-number">{{ $presenceCount }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row my-5">
                    <div class="container">
                        <h2>Grafik Jumlah Karyawan Per Lokasi</h2>
                        <canvas id="locationChart"></canvas>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="container">
                        <h2>Grafik Jumlah Karyawan Per Department</h2>
                        <canvas id="departmentChart"></canvas>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="container">
                        <h2>Grafik Jumlah Karyawan Per Jabatan</h2>
                        <canvas id="titleChart"></canvas>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-md-6">
                        <div style="width: 50%; margin: auto;">
                            <h2>Grafik Jumlah Karyawan Laki-laki & Perempuan</h2>
                            <canvas id="genderPieChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="width: 50%; margin: auto;">
                            <h2>Grafik Jumlah Karyawan Berdasarkan Jenjang Pendidikan</h2>
                            <canvas id="educationChart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
