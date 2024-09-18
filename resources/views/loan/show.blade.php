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
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Detail Pinjaman</h3>
                            </div>
                            <div class="card-body">
                                <p class="font-weight-bold mb-3">NIK Peminjam: {{ $loan->employee->nik }}</p>
                                <p class="font-weight-bold mb-3">Nama Peminjam: {{ $loan->employee->name }}</p>
                                <p class="font-weight-bold mb-3">Departemen: {{ $loan->employee->department->name }}
                                </p>
                                <hr>
                                <p class="mb-3">Tanggal Pinjam: {{ $loan->transaction_date }}</p>
                                <p class="mb-3">No Transaksi: {{ $loan->no_transaction }}
                                </p>
                                <p class="mb-3">Besar Pinjaman:
                                    {{ $loan->formatted_amount }}
                                </p>
                                <p class="mb-3">Jumlah Cicilan: {{ $loan->installment }}X</p>
                                <p class="mb-3">Bunga: {{ $loan->interest_rate }}%</p>
                                {{-- <p class="mb-3">Jumlah Bunga: {{ $loan->formatted_interest_amount }}</p>
                                <p class="mb-3">Cicilan Perbulan: {{ $loan->formatted_montly_installment }}</p> --}}
                                {{-- <p class="mb-3">Belum Terbayar: {{ $loan->formatted_amount }} --}}
                                </p>
                                <hr>
                                <div class="form-group">
                                    <label for="note">Catatan</label>
                                    <textarea class="form-control" name="note" id="note" cols="30" rows="8" disabled>{{ $loan->note }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('loan.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
