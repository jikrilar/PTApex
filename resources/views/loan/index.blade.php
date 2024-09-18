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
                            <a href="loan/create/{{ Auth::guard('employee')->id() }}"
                                class="btn btn-success mb-3">Ajukan Pinjaman</a>
                            <h5>Histori Peminjaman Karyawan</h5>
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
                                        <th style="width: 10px">No transaksi</th>
                                        <th>NIK</th>
                                        <th>Nama Peminjam</th>
                                        <th>Jumlah Pinjaman</th>
                                        <th>Cicilan</th>
                                        <th>Bunga</th>
                                        <th>Total Tagihan</th>
                                        {{-- <th>Bukti Transfer</th> --}}
                                        <th>Action</th>
                                        <th>Tagihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loans as $loan)
                                        <tr class="align-middle">
                                            <td>{{ $loan->no_transaction }}</td>
                                            <td>{{ $loan->employee->nik }}</td>
                                            <td>{{ $loan->employee->name }}</td>
                                            <td>{{ $loan->formatted_amount }}
                                            </td>
                                            <td>{{ $loan->installment }}X</td>
                                            <td>{{ $loan->interest_rate }}%</td>
                                            <td>{{ $loan->formatted_amount_with_interest }}</td>
                                            {{-- <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#addressModal-{{ $loan->id }}">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </td> --}}
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('loan.show', $loan->id) }}"
                                                        class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('installment.payment', $loan->id) }}"
                                                    class="btn btn-success">Bayar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <!-- Tombol Pagination -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $loans->links('pagination::bootstrap-4') }}
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

@foreach ($loans as $loan)
    <!-- Modal Bootstrap -->
    <div class="modal fade" id="addressModal-{{ $loan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header Modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alamat Lokasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Body Modal -->
                <div class="modal-body">
                    <!-- Konten Modal -->
                    <img src="{{ asset('storage/' . $loan->invoice) }}" alt="" width="100" height="auto">
                </div>
            </div>
        </div>
    </div>
@endforeach
