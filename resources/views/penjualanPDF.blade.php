<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi Hari Ini</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
        body {
            font-family: 'Mulish', sans-serif;

        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #02A3EC;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            border-right: 1px black solid;
            border-left: 1px black solid;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #02A3EC;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #02A3EC;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('assets/icons/logo_sekolah.webp') }}" alt="" style="width: 100px;">
        <h3 class="text-red-700">KOPERASI SMKN 65 JAKARTA</h3>
    </div>


    <h4>Data Penjualan Hari Ini : {{ $hari }}. {{ $tanggal->toFormattedDateString() }}</h4>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Stock Awal</th>
                <th>Terjual</th>
                <th>Sisa Stock</th>
                <th>Harga</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualan as $item)
                @php
                    $sisa_stock = $item->product->stock - $item->penjualan;
                @endphp
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->product->stock }}</td>
                    <td>{{ $item->penjualan }}</td>
                    <td>{{ $sisa_stock }}</td>
                    <td>Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->pendapatan, 0, ',', '.') }} </td>
                </tr>
                <!-- and so on... -->
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th id="total" colspan="5" style="border: 1px black solid">Total Pendapatan Hari Ini :</th>
                <td style="border: 1px black solid">Rp {{ number_format($penjualan->sum('pendapatan', 0, ',', '.')) }}
                </td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
