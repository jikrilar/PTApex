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
                        <h1>Create Location</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('location.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Create Location</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="code">Kode</label>
                                        <input type="text" class="form-control" id="code" placeholder="kode"
                                            name="code">
                                    </div>
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <input type="text" class="form-control" id="brand" placeholder="brand"
                                            name="brand">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <input type="text" class="form-control" id="address" placeholder="address"
                                            name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Kota</label>
                                        <input type="text" class="form-control" id="city" placeholder="kota"
                                            name="city">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="email"
                                            name="emaik">
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">Telp</label>
                                        <input type="text" class="form-control" id="telp" placeholder="telp"
                                            name="telp">
                                    </div>
                                    <div class="form-group">
                                        <label for="area">Luas Area (meter persegi)</label>
                                        <input type="number" class="form-control" id="area"
                                            placeholder="luas area" name="area">
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
