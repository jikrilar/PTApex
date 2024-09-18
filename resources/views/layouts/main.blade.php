<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Absensi PT Apex Mitra Malindo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Absensi PT Apex Mitra Malindo">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/chart.css') }}">

    <link rel="stylesheet" href="{{ asset('css/file-input.css') }}">

    <style>
        .container {
            width: 80%;
            margin: 0 auto;
        }

        canvas {
            max-width: 100%;
            height: 400px;
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    @include('sweetalert::alert')

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

    <script src="{{ asset('js/chart.js') }}"></script>

    <script src="{{ asset('js/file-input.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @if (Request::is('presence/boutique') || Request::is('presence/headoffice'))
        <script type="text/javascript">
            // Inisialisasi webcam
            Webcam.set({
                width: 400,
                height: 300,
                image_format: 'png',
                png_quality: 90
            });

            // Variabel untuk mengetahui apakah webcam berhasil terhubung
            var webcamLoaded = false;

            // Attach webcam dan cek apakah webcam berhasil terhubung
            Webcam.attach('#camera');

            Webcam.on('live', function() {
                // Jika webcam terhubung dengan sukses
                webcamLoaded = true;
            });

            Webcam.on('error', function(err) {
                // Jika ada error saat menghubungkan webcam
                webcamLoaded = false;
            });

            // Fungsi untuk menangkap foto sebelum submit form
            document.getElementById('absenForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Mencegah form dikirim langsung

                if (webcamLoaded) {
                    // Ambil snapshot dari webcam jika webcam berhasil terhubung
                    Webcam.snap(function(data_uri) {
                        // Simpan hasil snapshot ke input hidden
                        document.getElementById('image').value = data_uri;

                        // Setelah foto diambil, submit form
                        document.getElementById('absenForm').submit();
                    });
                } else {
                    // Jika webcam tidak tersedia, submit form tanpa mengambil foto
                    document.getElementById('absenForm').submit();
                }
            });
        </script>
    @endif

    <script>
        // Ambil data dari API menggunakan AJAX
        fetch('/location-data')
            .then(response => response.json())
            .then(data_location => {
                // Data dari server
                const labels = data_location.map(item => item.code); // Mengambil kode lokasi
                const employeeCounts = data_location.map(item => item.employee_count); // Mengambil jumlah karyawan

                // Konfigurasi Chart.js
                const ctx = document.getElementById('locationChart').getContext('2d');
                const locationChart = new Chart(ctx, {
                    type: 'bar', // Grafik Batang
                    data: {
                        labels: labels, // Nama lokasi
                        datasets: [{
                            label: 'Jumlah Karyawan',
                            data: employeeCounts, // Data jumlah karyawan
                            backgroundColor: 'rgba(54, 162, 235, 0.6)', // Warna batang
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true // Mulai dari 0
                            }
                        },
                        onClick: (event, elements) => {
                            if (elements.length > 0) {
                                const chartElement = elements[0]; // Elemen yang diklik
                                const locationCode = labels[chartElement
                                    .index]; // Mendapatkan kode lokasi dari elemen yang diklik

                                // Navigasi ke halaman berdasarkan lokasi
                                window.location.href = `/employees/location/${locationCode}`;
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error:', error));
    </script>

    <script>
        // Ambil data dari API menggunakan AJAX
        fetch('/department-data')
            .then(response => response.json())
            .then(data_department => {
                // Data dari server
                const labels = data_department.map(item => item.name); // Nama departemen
                const employeeCounts = data_department.map(item => item.employee_count); // Jumlah karyawan

                // Konfigurasi Chart.js
                const ctx = document.getElementById('departmentChart').getContext('2d');
                const departmentChart = new Chart(ctx, {
                    type: 'bar', // Grafik Batang
                    data: {
                        labels: labels, // Nama departemen
                        datasets: [{
                            label: 'Jumlah Karyawan',
                            data: employeeCounts, // Data jumlah karyawan
                            backgroundColor: 'rgba(54, 162, 235, 0.6)', // Warna batang
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true // Mulai dari 0
                            }
                        },
                        onClick: (event, elements) => {
                            if (elements.length > 0) {
                                const chartElement = elements[0]; // Elemen yang diklik
                                const departmentName = labels[chartElement
                                    .index]; // Nama departemen dari elemen yang diklik

                                // Navigasi ke halaman berdasarkan departemen
                                window.location.href = `/employees/department/${departmentName}`;
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error:', error));
    </script>

    <script>
        // Ambil data dari API menggunakan AJAX
        fetch('/gender-data')
            .then(response => response.json())
            .then(data_gender => {
                // Data dari server
                const labels = data_gender.map(item => item.gender); // Jenis kelamin
                const counts = data_gender.map(item => item.count); // Jumlah karyawan

                // Konfigurasi Chart.js
                const ctx = document.getElementById('genderPieChart').getContext('2d');
                const genderPieChart = new Chart(ctx, {
                    type: 'pie', // Grafik Pie
                    data: {
                        labels: labels, // Jenis kelamin
                        datasets: [{
                            label: 'Jumlah Karyawan',
                            data: counts, // Data jumlah karyawan
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)', // Warna untuk laki-laki
                                'rgba(54, 162, 235, 0.6)', // Warna untuk perempuan
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        onClick: (event, elements) => {
                            if (elements.length > 0) {
                                const chartElement = elements[0]; // Elemen yang diklik
                                const gender = labels[chartElement
                                    .index]; // Dapatkan jenis kelamin dari elemen yang diklik

                                // Navigasi ke halaman berdasarkan gender
                                window.location.href = `/employees/gender/${gender}`;
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error:', error));
    </script>

    <script>
        fetch('/education-data')
            .then(response => response.json())
            .then(data_education => {
                const labels = data_education.map(item => item.last_education); // Label pendidikan
                const employeeCounts = data_education.map(item => item.total); // Data jumlah karyawan

                const ctx = document.getElementById('educationChart').getContext('2d');
                const educationChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Karyawan',
                            data: employeeCounts,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        onClick: (event, elements) => {
                            if (elements.length > 0) {
                                const chartElement = elements[0]; // Elemen yang diklik
                                const education = labels[chartElement
                                    .index]; // Dapatkan label (pendidikan) dari elemen yang diklik

                                // Navigasi ke halaman berdasarkan pendidikan
                                window.location.href = `/employees/education/${education}`;
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error:', error));
    </script>

    <script>
        // Ambil data dari API menggunakan AJAX
        fetch('/title-data')
            .then(response => response.json())
            .then(data_title => {
                // Data dari server
                const labels = data_title.map(item => item.name); // Nama jabatan
                const employeeCounts = data_title.map(item => item.employee_count); // Jumlah karyawan

                // Konfigurasi Chart.js
                const ctx = document.getElementById('titleChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar', // Grafik Batang
                    data: {
                        labels: labels, // Nama jabatan
                        datasets: [{
                            label: 'Jumlah Karyawan',
                            data: employeeCounts, // Data jumlah karyawan
                            backgroundColor: 'rgba(54, 162, 235, 0.6)', // Warna batang
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true // Mulai dari 0
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error:', error));
    </script>

    <script>
        // Fungsi untuk memformat angka menjadi format Rupiah
        function formatRupiah(number) {
            return 'Rp ' + number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }

        // Fungsi untuk menghitung jumlah cicilan
        function calculateInstallment() {
            // Ambil nilai dari input 'amount' dan 'installment'
            let amount = parseFloat(document.getElementById('amount').value);
            let installment = parseInt(document.getElementById('installment').value);

            // Jika amount dan installment memiliki nilai, lakukan pembagian
            if (!isNaN(amount) && !isNaN(installment) && installment > 0) {
                let installmentAmount = amount / installment;
                document.getElementById('installmentAmount').value = formatRupiah(
                    installmentAmount); // Tampilkan hasil dalam format Rupiah
            } else {
                document.getElementById('installmentAmount').value = ''; // Kosongkan jika tidak ada nilai yang valid
            }
        }

        // Tambahkan event listener untuk menghitung ulang ketika amount atau installment berubah
        document.getElementById('amount').addEventListener('input', calculateInstallment);
        document.getElementById('installment').addEventListener('change', calculateInstallment);
    </script>

    <script>
        function showInterestRate() {
            // Ambil nilai dari input select cicilan
            let installment = document.getElementById('installment').value;

            // Tentukan bunga berdasarkan lama cicilan
            let interestRate;
            switch (installment) {
                case '1':
                    interestRate = 0; // Bunga 0% untuk cicilan 1X
                    break;
                case '3':
                    interestRate = 2; // Bunga 2% untuk cicilan 3X
                    break;
                case '6':
                    interestRate = 4; // Bunga 4% untuk cicilan 6X
                    break;
                case '12':
                    interestRate = 6; // Bunga 6% untuk cicilan 12X
                    break;
                default:
                    interestRate = 0;
            }

            // Tampilkan bunga pada input interestRate
            document.getElementById('interestRate').value = interestRate + "%";
        }

        // Panggil fungsi saat halaman dimuat agar bunga ditampilkan jika cicilan sudah dipilih
        document.addEventListener('DOMContentLoaded', showInterestRate);
    </script>

    {{-- <script>
        setInterval(function() {
            $.ajax({
                url: '/check-reset-status', // Endpoint untuk memeriksa status reset
                type: 'GET',
                success: function(data) {
                    if (data.isReset) {
                        // Jika data absensi telah di-reset, refresh data di halaman tanpa refresh full
                        $('#absensiTable').load(location.href + " #absensiTable > *");
                    }
                }
            });
        }, 30000);
    </script> --}}
</body>

</html>
