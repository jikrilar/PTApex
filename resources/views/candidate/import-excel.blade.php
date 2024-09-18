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
                        <h1>Import Data Excel Candidate</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Import Excel</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <label for="ktp_photo">Upload file Excel</label>
                                    <div class="file-upload">
                                        <input type="file" id="file-input" multiple name="file">
                                        <div class="drop-area" id="drop-area">
                                            <p>Drag & Drop file excel disini atau click untuk upload</p>
                                        </div>
                                        <div id="file-list"></div>
                                    </div>
                                    <script src="script.js"></script>
                                    {{-- <div class="form-group">
                                        <label for="ktp_photo">Photo KTP</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ktp_photo"
                                                    name="ktp_photo">
                                                <label class="custom-file-label" for="ktp_photo">Upload foto
                                                    KTP</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo"
                                                    name="photo">
                                                <label class="custom-file-label" for="photo">Upload foto
                                                    pribadi</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="CV">CV</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="CV"
                                                    name="CV">
                                                <label class="custom-file-label" for="CV">Upload file CV</label>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                @if (session('success'))
                    <p>{{ session('success') }}</p>
                @endif
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
