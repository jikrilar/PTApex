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
                <form action="{{ route('loan.update', $loan->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Peminjaman Karyawan</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="row my-3">
                                        <div class="col-md-6">
                                            <h5 class="font-weight-bold"> NIK : {{ $loan->employee->nik }}</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="font-weight-bold"> Nama : {{ $loan->employee->name }}</h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="amount">Jumlah Pinjaman (Rupiah)</label>
                                        <input type="number" class="form-control" id="amount" placeholder="amount"
                                            name="amount" value="{{ $loan->amount }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Cicilan</label>
                                        <select class="form-control" name="installment">
                                            <option value="1" {{ $installment == 1 ? 'selected' : '' }}>1X</option>
                                            <option value="3" {{ $installment == 3 ? 'selected' : '' }}>3X</option>
                                            <option value="6" {{ $installment == 6 ? 'selected' : '' }}>6X</option>
                                            <option value="12" {{ $installment == 12 ? 'selected' : '' }}>12X
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Catatan</label>
                                        <textarea class="form-control" name="note" id="note" cols="30" rows="10">{{ $loan->note }}</textarea>
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
