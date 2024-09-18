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
                        <h1>Edit Data Karyawan</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General Data</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control" id="nik" name="nik"
                                            value="{{ $employee->nik }}" placeholder="Nomor Induk Karyawan">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $employee->name }}" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="birthplace">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="birthplace" name="birthplace"
                                            value="{{ $employee->birthplace }}" placeholder="Tempat Lahir">
                                    </div>
                                    <div class="form-group">
                                        <label for="birthdate">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="birthdate" name="birthdate"
                                            value="{{ $employee->birthdate }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $employee->email }}" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password (Kosongkan jika tidak ingin mengubah)">
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">Handphone</label>
                                        <input type="text" class="form-control" id="telp" name="telp"
                                            value="{{ $employee->telp }}" placeholder="No Handphone">
                                    </div>
                                    <div class="form-group">
                                        <label>Golongan Darah</label>
                                        <select class="form-control" name="blood_type">
                                            <option value="A" {{ $employee->blood_type == 'A' ? 'selected' : '' }}>
                                                A</option>
                                            <option value="B" {{ $employee->blood_type == 'B' ? 'selected' : '' }}>
                                                B</option>
                                            <option value="AB"
                                                {{ $employee->blood_type == 'AB' ? 'selected' : '' }}>AB</option>
                                            <option value="O"
                                                {{ $employee->blood_type == 'O' ? 'selected' : '' }}>O</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="gender">
                                            <option value="laki-laki"
                                                {{ $employee->gender == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="perempuan"
                                                {{ $employee->gender == 'perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select class="form-control" name="religion">
                                            <option value="islam"
                                                {{ $employee->religion == 'islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="kristen protestan"
                                                {{ $employee->religion == 'kristen protestan' ? 'selected' : '' }}>
                                                Kristen Protestan</option>
                                            <option value="katolik"
                                                {{ $employee->religion == 'katolik' ? 'selected' : '' }}>Katolik
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Pernikahan</label>
                                        <select class="form-control" name="marital_status">
                                            <option value="lajang"
                                                {{ $employee->marital_status == 'lajang' ? 'selected' : '' }}>Lajang
                                            </option>
                                            <option value="menikah"
                                                {{ $employee->marital_status == 'menikah' ? 'selected' : '' }}>Menikah
                                            </option>
                                            <option value="menikah anak 1"
                                                {{ $employee->marital_status == 'menikah anak 1' ? 'selected' : '' }}>
                                                Menikah Anak 1</option>
                                            <option value="menikah anak 2"
                                                {{ $employee->marital_status == 'menikah anak 2' ? 'selected' : '' }}>
                                                Menikah Anak 2</option>
                                            <option value="menikah anak 3"
                                                {{ $employee->marital_status == 'menikah anak 3' ? 'selected' : '' }}>
                                                Menikah Anak 3</option>
                                            <option value="duda atau janda"
                                                {{ $employee->marital_status == 'duda atau janda' ? 'selected' : '' }}>
                                                Duda atau Janda</option>
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
                                                <option value="{{ $department->id }}"
                                                    {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                                                    {{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <select class="form-control" name="location_id">
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}"
                                                    {{ $employee->location_id == $location->id ? 'selected' : '' }}>
                                                    {{ $location->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <select class="form-control" name="title_id">
                                            @foreach ($titles as $title)
                                                <option value="{{ $title->id }}"
                                                    {{ $employee->title_id == $title->id ? 'selected' : '' }}>
                                                    {{ $title->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="join_date">Tanggal Join</label>
                                        <input type="date" class="form-control" id="join_date" name="join_date"
                                            value="{{ old('join_date', $employee->join_date) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="magang"
                                                {{ $employee->status == 'magang' ? 'selected' : '' }}>Magang</option>
                                            <option value="karyawan tetap"
                                                {{ $employee->status == 'karyawan tetap' ? 'selected' : '' }}>Karyawan
                                                Tetap</option>
                                            <option value="karyawan kontrak"
                                                {{ $employee->status == 'karyawan kontrak' ? 'selected' : '' }}>
                                                Karyawan Kontrak</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bank">Bank</label>
                                        <input type="text" class="form-control" id="bank" name="bank"
                                            value="{{ old('bank', $employee->bank) }}" placeholder="Bank">
                                    </div>
                                    <div class="form-group">
                                        <label for="account_number">Nomor Rekening</label>
                                        <input type="text" class="form-control" id="account_number"
                                            name="account_number"
                                            value="{{ old('account_number', $employee->account_number) }}"
                                            placeholder="Nomor Rekening">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- right column -->
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pribadi</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <input type="text" class="form-control" id="address"
                                            placeholder="Alamat" name="address" value="{{ $employee->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="emergency_contact">Kontak Darurat</label>
                                        <input type="text" class="form-control" id="emergency_contact"
                                            placeholder="Kontak Darurat" name="emergency_contact"
                                            value="{{ $employee->emergency_contact }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="ktp_number">Nomor KTP</label>
                                        <input type="text" class="form-control" id="ktp_number"
                                            placeholder="Nomor KTP" name="ktp_number"
                                            value="{{ $employee->ktp_number }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="kk_number">Nomor KK</label>
                                        <input type="text" class="form-control" id="kk_number"
                                            placeholder="Nomor KK" name="kk_number"
                                            value="{{ $employee->kk_number }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="bpjs_number">BPJS Kesehatan</label>
                                        <input type="text" class="form-control" id="bpjs_number"
                                            placeholder="BPJS Kesehatan" name="bpjs_number"
                                            value="{{ $employee->bpjs_number }}">
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
                                        <div class="form-group">
                                            <select class="form-control" name="last_education" id="last_education">
                                                <option value="SMA"
                                                    {{ old('last_education', $employee->last_education) == 'SMA' ? 'selected' : '' }}>
                                                    SMA</option>
                                                <option value="SMK"
                                                    {{ old('last_education', $employee->last_education) == 'SMK' ? 'selected' : '' }}>
                                                    SMK</option>
                                                <option value="D3"
                                                    {{ old('last_education', $employee->last_education) == 'D3' ? 'selected' : '' }}>
                                                    D3</option>
                                                <option value="S1"
                                                    {{ old('last_education', $employee->last_education) == 'S1' ? 'selected' : '' }}>
                                                    S1</option>
                                                <option value="S2"
                                                    {{ old('last_education', $employee->last_education) == 'S2' ? 'selected' : '' }}>
                                                    S2</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="education_place">Tempat Pendidikan</label>
                                        <input type="text" class="form-control" id="education_place"
                                            placeholder="Sekolah / Perguruan Tinggi Terakhir" name="education_place"
                                            value="{{ $employee->education_place }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="education_city">Kota Pendidikan</label>
                                        <input type="text" class="form-control" id="education_city"
                                            placeholder="Kota Pendidikan" name="education_city"
                                            value="{{ $employee->education_city }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="graduation_year">Tahun Lulus</label>
                                        <input type="text" class="form-control" id="graduation_year"
                                            placeholder="Tahun Lulus" name="graduation_year"
                                            value="{{ $employee->graduation_year }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Pengalaman -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Pengalaman Terakhir</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="last_experience">Pengalaman Terakhir</label>
                                        <textarea class="form-control" id="last_experience" name="last_experience">{{ $employee->last_experience }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="working_period">Periode Kerja (Tahun)</label>
                                        <input type="number" class="form-control" id="working_period"
                                            name="working_period" value="{{ $employee->working_period }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_title">Jabatan Terakhir</label>
                                        <input type="text" class="form-control" id="last_title" name="last_title"
                                            value="{{ $employee->last_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_job_description">Deskripsi Pekerjaan Terakhir</label>
                                        <textarea class="form-control" id="last_job_description" name="last_job_description">{{ $employee->last_job_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="skill">Keahlian</label>
                                        <textarea class="form-control" id="skill" name="skill">{{ $employee->skill }}</textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- file upload --}}
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pribadi</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="photo">Photo pribadi</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo"
                                                    name="photo">
                                                <label class="custom-file-label" for="photo">Upload Photo</label>
                                            </div>
                                        </div>
                                        @if ($employee->photo)
                                            <img src="{{ asset('storage/' . $employee->photo) }}" alt="Photo"
                                                width="100">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="ktp_photo">Photo KTP</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ktp_photo"
                                                    name="ktp_photo">
                                                <label class="custom-file-label" for="ktp_photo">Upload Photo</label>
                                            </div>
                                        </div>
                                        @if ($employee->photo)
                                            <img src="{{ asset('storage/' . $employee->photo) }}" alt="Photo"
                                                width="100">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Update Data</button>
                </form>
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
