@extends('layouts.main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layouts.sidebar')
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>List Tagihan Pinjaman</h5>
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        {{-- <th style="width: 10px">No transaksi</th> --}}
                                        <th>Tagihan Ke</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Tagihan Pokok</th>
                                        <th>Bunga %</th>
                                        <th>Tagihan Bunga</th>
                                        <th>Denda</th>
                                        <th>Total Tagihan</th>
                                        <th>Terbayarkan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($installments as $installment)
                                        <tr class="align-middle">
                                            {{-- <td>{{ $installment->code_invoice }}</td> --}}
                                            <td>{{ $installment->installment_number }}</td>
                                            <td>{{ $installment->due_date }}</td>
                                            <td>{{ $installment->formatted_principal_amount }}</td>
                                            <td>{{ $installment->loan->interest_rate }}%</td>
                                            <td>{{ $installment->formatted_interest_amount }}</td>
                                            <td>{{ $installment->formatted_penalty_amount }}</td>
                                            <td>{{ $installment->formatted_total_installment_amount }}</td>
                                            <td>{{ $installment->formatted_total_paid_amount }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <!-- Tombol Pagination -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $installments->links('pagination::bootstrap-4') }}
                            </ul>
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
