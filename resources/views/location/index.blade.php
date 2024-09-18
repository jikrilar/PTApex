@extends('layouts.main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layouts.sidebar')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Lokasi Office & Store</h1>
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
                            <a href="{{ route('location.create') }}" class="btn btn-success">Tambahkan <i
                                    class="fa fa-plus"></i></a>
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
                                        <th style="width: 10px">Kode</th>
                                        <th>Brand</th>
                                        <th>Kota</th>
                                        <th>Luas Area</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($locations as $location)
                                        <tr class="align-middle">
                                            <td>{{ $location->code }}</td>
                                            <td>{{ $location->brand }}</td>
                                            <td>{{ $location->city }} <button type="button" class="btn btn-transparent"
                                                    data-toggle="modal" data-target="#addressModal-{{ $location->id }}">
                                                    <i class="fa fa-eye"></i>
                                                </button></td>
                                            <td>{{ $location->area }} m2</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('location.show', $location->id) }}"
                                                        class="btn btn-warning mr-2 d-flex align-items-center"><span
                                                            class="mr-1">karyawan</span>
                                                        <i class="fa fa-eye"></i></a>
                                                    <a href="{{ route('location.edit', $location->id) }}"
                                                        class="btn btn-primary mr-2 d-flex align-items-center"><i
                                                            class="fa fa-edit"></i></a>
                                                    <form action="{{ route('location.destroy', $location->id) }}"
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
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@foreach ($locations as $location)
    <!-- Modal Bootstrap -->
    <div class="modal fade" id="addressModal-{{ $location->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                    {{ $location->address }}
                </div>
            </div>
        </div>
    </div>
@endforeach
