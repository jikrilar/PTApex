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
                <form action="{{ route('cashbank-loan.store', $loan->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Pembayaran Pinjaman</h3>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="loan_id" value="{{ $loan->id }}">
                                    @if (Auth::guard('admin')->check())
                                        <p class="font-weight-bold mb-3">NIK Peminjam: {{ $loan->employee->nik }}</p>
                                        <p class="font-weight-bold mb-3">Nama Peminjam: {{ $loan->employee->name }}</p>
                                        <p class="font-weight-bold mb-3">Departemen:
                                            {{ $loan->employee->department->name }}
                                        </p>
                                        <hr>
                                    @endif
                                    <p class="mb-3">No Transaksi : {{ $loan->no_transaction }}
                                    </p>
                                    <p class="mb-3">Besar Pinjaman:
                                        {{ $loan->formatted_amount }}
                                    </p>
                                    <p class="mb-3">Jumlah Cicilan: {{ $loan->installment }}X</p>
                                    <p class="mb-3">Bunga: {{ $loan->interest_rate }}%</p>
                                    <p class="mb-3">Cicilan Perbulan: {{ $loan->formatted_montly_installment }}</p>
                                    <p class="mb-3">Pembayaran Cicilan Ke: {{ $loan->paid_installment + 1 }}</p>
                                    <p class="mb-3">Belum Terbayar: {{ $loan->formatted_amount }}
                                    </p>
                                    <hr>
                                    <div class="form-group">
                                        <label for="amount">Nominal Pembayaran</label>
                                        <input type="number" class="form-control" id="amount" placeholder="amount"
                                            name="amount">
                                    </div>
                                    <div class="form-group">
                                        <label for="invoice">Upload Bukti Transfer</label>
                                        <div class="file-upload">
                                            <input type="file" id="file-input" multiple name="invoice">
                                            <div class="drop-area" id="drop-area">
                                                <p>Drag & Drop foto bukti transfer disini atau click untuk upload</p>
                                            </div>
                                            <div id="file-list"></div>
                                        </div>
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
