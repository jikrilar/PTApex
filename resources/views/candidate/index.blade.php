@extends('layouts.main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layouts.sidebar')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Data Calon Karyawan (Candidate)</h1>
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
                            <a href="{{ route('candidate.create') }}" class="btn btn-success">Create <i
                                    class="fa fa-plus"></i></a>

                            <a href="{{ route('candidate.export') }}" class="btn btn-success ml-1">Export <i
                                    class="fa fa-download"></i></a>

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
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Departemen</th>
                                        <th>Lokasi</th>
                                        <th>Jabatan</th>
                                        <th>Telp</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidates as $candidate)
                                        <tr class="align-middle">
                                            <td>{{ $candidate->id }}</td>
                                            <td><img src="{{ asset('storage/' . $candidate->photo) }}" alt=""
                                                    width="100" height="auto"></td>
                                            <td>{{ $candidate->name }}</td>
                                            <td>{{ $candidate->department->name }}</td>
                                            <td>{{ $candidate->location->code }}</td>
                                            <td>{{ $candidate->title->name }}</td>
                                            <td>{{ $candidate->telp }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('candidate.show', $candidate->id) }}"
                                                        class="btn btn-warning mr-2 d-flex align-items-center"><i
                                                            class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('candidate.edit', $candidate->id) }}"
                                                        class="btn btn-primary mr-2 d-flex align-items-center"><i
                                                            class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('candidate.destroy', $candidate->id) }}"
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
