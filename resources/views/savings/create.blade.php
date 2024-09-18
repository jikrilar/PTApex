@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Simpan Pinjam PT Apex Mitra Malindo</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('savings.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Simpanan Karyawan</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <input type="hidden" name="employee_id" value="{{ $employee->nik }}">
                                    <div class="row my-3">
                                        <div class="col-md-6">
                                            <h5 class="font-weight-bold"> NIK : {{ $employee->nik }}</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="font-weight-bold"> Nama : {{ $employee->name }}</h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="amount">Jumlah Pinjaman (Rupiah)</label>
                                        <input type="number" class="form-control" id="amount" placeholder="amount"
                                            name="amount">
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Catatan</label>
                                        <textarea class="form-control" name="note" id="note" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
