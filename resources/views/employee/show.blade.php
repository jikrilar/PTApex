@extends('layouts.main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('layouts.sidebar')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil Karyawan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('/storage' . $employee->photo) }}">
                            </div>

                            <h3 class="profile-username text-center">{{ $employee->name }}</h3>

                            <p class="text-muted text-center">{{ $employee->email }}</p>

                            <p class="text-muted text-center">{{ $employee->telp }}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                {{ $employee->last_education }} - {{ $employee->education_place }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Department</strong>

                            <p class="text-muted">{{ $employee->department->name }}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                {{ $employee->skill }}
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                @if ($employee->active_status == 'resign')
                                    <li class="nav-item"><a class="nav-link active" href="#resign"
                                            data-toggle="tab">Resign</a></li>
                                @endif
                                <li class="nav-item"><a class="nav-link @if ($employee->active_status != 'resign') active @endif"
                                        href="#general-data" data-toggle="tab">Data General</a></li>
                                <li class="nav-item"><a class="nav-link" href="#company"
                                        data-toggle="tab">Perusahaan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#personal-data" data-toggle="tab">Data
                                        Pribadi</a></li>
                                <li class="nav-item"><a class="nav-link" href="#education"
                                        data-toggle="tab">Pendidikan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#experience"
                                        data-toggle="tab">Pengalaman</a></li>
                                <li class="nav-item"><a class="nav-link" href="#note" data-toggle="tab">Note</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="@if ($employee->active_status == 'resign') active @endif tab-pane" id="resign">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">NIK</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->resign_date }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nama</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->resign_description }}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="@if ($employee->active_status != 'resign') active @endif tab-pane" id="general-data">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">NIK</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="{{ $employee->nik }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nama</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->email }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Telp</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->telp }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->birthplace }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->birthdate }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Golongan Darah</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->blood_type }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status Pernikahan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->marital_status }}" disabled>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control"
                                                        value="{{ $employee->address }}" disabled>
                                                </div>
                                            </div> --}}
                                        {{-- <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nomor KTP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control"
                                                        value="{{ $employee->ktp_number }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nomor KK</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control"
                                                        value="{{ $employee->kk_number }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control"
                                                        value="{{ $employee->address }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control"
                                                        value="{{ $employee->address }}" disabled>
                                                </div>
                                            </div> --}}
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="company">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Department</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->department->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Lokasi</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->location->code }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Jabatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->title->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->status }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Bank</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->bank }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nomor Rekening</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->account_number }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Plafon</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->plafon }}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="personal-data">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->address }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Kontak Darurat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->emergency_contact }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nomor KTP <a
                                                    href="{{ '/storage/' . $employee->ktp_photo }}"><i
                                                        class="fa fa-eye" aria-hidden="true"></i></a></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->ktp_number }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nomor KK</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->kk_number }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">BPJS Kesehatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->bpjs_number }}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="education">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pendidikan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->last_education }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Sekolah / Perguruan Tinggi
                                                Terakhir</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->education_place }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Kota Pendidikan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->education_city }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Tahun Lulus Pendidikan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->graduation_year }}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="experience">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pengalaman Terakhir</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->last_experience }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Jabatan Terakhir</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->last_title }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Periode Bekerja</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->working_period }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Deskripsi Pekerjaan
                                                Terakhir</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $employee->skill }}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="note">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="note">Catatan
                                                Karyawan</label>
                                            <div class="col-sm-8">
                                                <textarea id="note" cols="30" rows="10" class="form-control" disabled>{{ $employee->internal_note }}</textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
