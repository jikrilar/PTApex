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
                        <h1>Tambah Data Karyawan</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control" id="nik"
                                            placeholder="Nomor Induk Karyawan" name="nik">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Nama Lengkap" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="birthplace">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="birthplace"
                                            placeholder="Tempat Lahir" name="birthplace">
                                    </div>
                                    <div class="form-group">
                                        <label for="birthdate">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="birthdate" name="birthdate">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email"
                                            name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">Handphone</label>
                                        <input type="text" class="form-control" placeholder="No Handphone"
                                            id="telp" name="telp">
                                    </div>
                                    <div class="form-group">
                                        <label>Golongan Darah</label>
                                        <select class="form-control" name="blood_type">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="gender">
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select class="form-control" name="religion">
                                            <option value="islam">Islam</option>
                                            <option value="kristen protestan">Kristen Protestan</option>
                                            <option value="katolik">Katolik</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Pernikahan</label>
                                        <select class="form-control" name="marital_status">
                                            <option value="lajang">Lajang</option>
                                            <option value="menikah">Menikah</option>
                                            <option value="menikah anak 1">Menikah Anak 1</option>
                                            <option value="menikah anak 2">Menikah Anak 2</option>
                                            <option value="menikah anak 3">Menikah Anak 3</option>
                                            <option value="duda atau janda">Duda atau Janda</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Jabatan -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Jabatan</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control" name="department_id">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <select class="form-control" name="location_id">
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <select class="form-control" name="title_id">
                                            @foreach ($titles as $title)
                                                <option value="{{ $title->id }}">{{ $title->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="join_date">Tanggal Join</label>
                                        <input type="date" class="form-control" id="join_date" name="join_date">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="magang">Magang</option>
                                            <option value="karyawan tetap">Karyawan Tetap</option>
                                            <option value="karyawan kontrak">Karyawan Kontrak</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bank">Bank</label>
                                        <input type="text" class="form-control" id="bank" placeholder="Bank"
                                            name="bank">
                                    </div>
                                    <div class="form-group">
                                        <label for="account_number">Nomor Rekening</label>
                                        <input type="text" class="form-control" id="account_number"
                                            placeholder="Nomor Rekening" name="account_number">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pribadi</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <input type="text" class="form-control" id="address"
                                            placeholder="Alamat" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="emergency_contact">Kontak Darurat</label>
                                        <input type="text" class="form-control" id="emergency_contact"
                                            placeholder="Kontak Darurat" name="emergency_contact">
                                    </div>
                                    <div class="form-group">
                                        <label for="ktp_number">Nomor KTP</label>
                                        <input type="text" class="form-control" id="ktp_number"
                                            placeholder="Nomor KTP" name="ktp_number">
                                    </div>
                                    <div class="form-group">
                                        <label for="kk_number">Nomor KK</label>
                                        <input type="text" class="form-control" id="kk_number"
                                            placeholder="Nomor KK" name="kk_number">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="ktp_photo">Photo KTP</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ktp_photo"
                                                    name="ktp_photo">
                                                <label class="custom-file-label" for="ktp_photo">Pilih Photo</label>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="bpjs_number">BPJS Kesehatan</label>
                                        <input type="text" class="form-control" id="bpjs_number"
                                            placeholder="BPJS Kesehatan" name="bpjs_number">
                                    </div>
                                </div>
                            </div>

                            <!-- Pendidikan Terakhir -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Pendidikan Terakhir</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir</label>
                                        <select class="form-control" name="last_education">
                                            <option value="SMA">SMA</option>
                                            <option value="SMK">SMK</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="education_place">Tempat Pendidikan</label>
                                        <input type="text" class="form-control" id="education_place"
                                            placeholder="Sekolah / Perguruan Tinggi Terakhir" name="education_place">
                                    </div>
                                    <div class="form-group">
                                        <label for="education_city">Kota Pendidikan</label>
                                        <input type="text" class="form-control" id="education_city"
                                            placeholder="Kota Pendidikan" name="education_city">
                                    </div>
                                    <div class="form-group">
                                        <label for="graduation_year">Tahun Lulus</label>
                                        <input type="text" class="form-control" id="graduation_year"
                                            placeholder="Tahun Lulus" name="graduation_year">
                                    </div>
                                </div>
                            </div>

                            <!-- Pengalaman Terakhir -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Pengalaman Terakhir</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="last_experience">Pengalaman Terakhir</label>
                                        <input type="text" class="form-control" id="last_experience"
                                            placeholder="Pengalaman Terakhir" name="last_experience">
                                    </div>
                                    <div class="form-group">
                                        <label for="working_period">Periode Kerja (Tahun)</label>
                                        <input type="number" class="form-control" id="working_period"
                                            placeholder="Masa Kerja" name="working_period">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_title">Jabatan Terakhir</label>
                                        <input type="text" class="form-control" id="last_title"
                                            placeholder="Jabatan Terakhir" name="last_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_job_description">Deskripsi Pekerjaan</label>
                                        <textarea class="form-control" id="last_job_description" name="last_job_description"
                                            placeholder="Deskripsi Pekerjaan"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="skill">Keahlian</label>
                                        <textarea class="form-control" id="skill" name="skill" placeholder="Keahlian"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- file upload -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">File Upload</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
