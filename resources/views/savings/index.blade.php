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
                            {{-- <a href="{{ route('savings.create') }}" class="btn btn-success">Create <i
                                    class="fa fa-plus"></i></a> --}}
                            <h5>Histori Simpanan Karyawan</h5>
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
                                        <th>id</th>
                                        <th>Nama</th>
                                        <th>Jumlah Simpan</th>
                                        <th>Catatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($savings as $saving)
                                        <tr class="align-middle">
                                            <td>{{ $saving->no_transaction }}</td>
                                            <td>{{ $saving->employee->nik }}</td>
                                            <td>{{ $saving->employee->name }}</td>
                                            <td>{{ $saving->amount }}</td>
                                            <td>{{ $saving->note }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('savings.show', $saving->id) }}"
                                                        class="btn btn-warning mr-2 d-flex align-items-center"><i
                                                            class="fa fa-eye"></i></a>
                                                    <a href="{{ route('savings.edit', $saving->id) }}"
                                                        class="btn btn-primary mr-2 d-flex align-items-center"><i
                                                            class="fa fa-edit"></i></a>
                                                    <form action="{{ route('savings.destroy', $saving->id) }}"
                                                        class="d-inline m-0 p-0" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger me-2 d-flex align-items-center"
                                                            type="submit"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
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
                                {{ $savings->links('pagination::bootstrap-4') }}
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
