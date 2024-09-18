@extends('layouts.main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layouts.sidebar')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Departemen</h1>
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
                            <a href="{{ route('department.create') }}" class="btn btn-success">Tambahkan <i
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
                                        <th style="width: 10px">No</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                        <tr class="align-middle">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $department->name }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('department.show', $department->id) }}"
                                                        class="btn btn-warning mr-2 d-flex align-items-center"><span
                                                            class="mr-1">karyawan</span>
                                                        <i class="fa fa-eye"></i></a>
                                                    <a href="{{ route('department.edit', $department->id) }}"
                                                        class="btn btn-primary mr-2 d-flex align-items-center"><i
                                                            class="fa fa-edit"></i></a>
                                                    <form action="{{ route('department.destroy', $department->id) }}"
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
