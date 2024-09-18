<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 24px;
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 5px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid #ddd;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Struk Pembayaran</h1>

        <div class="info">
            <p><strong>Tanggal Transaksi:</strong> {{ $date }}</p>
            <p><strong>Nomor Transaksi:</strong> {{ $loan->no_transaction }}</p>
            <p><strong>Nama Karyawan:</strong> {{ $employee->name }}</p>
            <p><strong>Departemen:</strong> {{ $employee->department->name }}</p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jumlah Pinjaman</td>
                    <td>Rp {{ number_format($loan->amount, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Sisa Hutang</td>
                    <td>Rp {{ number_format($loan->remaining_debt, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Bunga</td>
                    <td>{{ $loan->interest_rate }}%</td>
                </tr>
                <tr>
                    <td>Jumlah Cicilan/Bulan</td>
                    <td>Rp {{ number_format($loan->monthly_installment, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>Terima kasih telah melakukan pembayaran.</p>
        </div>
    </div>

</body>

</html>
