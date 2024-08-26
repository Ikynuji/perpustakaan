<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

        body {
            font-family: arial;

        }

        table {
            border-bottom: 4px solid #000;
            /* padding: 2px */
        }

        .tengah {
            text-align: center;
            line-height: 5px;
        }

        #warnatable th {
            padding-top: 12px;
            padding-bottom: 12px;
            /* text-align: left; */
            background-color: #0423aa;
            color: white;
            /* text-align: center; */
        }

        #warnatable tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #warnatable tr:hover {
            background-color: #ddd;
        }

        .textmid {
            /* text-align: center; */
        }

        .signature {
            position: absolute;
            margin-top: 20px;
            text-align: right;
            right: 50px;
            font-size: 14px;
        }

        .date-container {
            font-family: arial;
            text-align: left;
            font-size: 14px;
        }
    </style>

    <div class="rangkasurat">
        <table width="100%">
            <tr>
                <td><img src="{{ public_path ('assets/logo-sekolah.png')}}" alt="logo" width="140px"></td>
                <td class="tengah">
                    <h4>SMK NEGERI 3 MARABAHAN</h4>
                    <p>Jl. Purwosari No.KM. 6, Purwosari Baru, Kec. Tamban, Kabupaten Barito Kuala, Kalimantan Selatan 70566</p>
                </td>
            </tr>
        </table>
    </div>

    <center>
        <h5 class="mt-4">Rekap Laporan Data Anggaran Buku</h5>
    </center>



    <br>

    <table class='table table-bordered' id="warnatable">
        <thead>
            <tr>
                <th class="px-6 py-2">No</th>
                <th class="px-6 py-2">Tanggal</th>
                <th class="px-6 py-2">Nama Buku</th>
                <th class="px-6 py-2">Kategori</th>
                <th class="px-6 py-2">Keterangan</th>
                <th class="px-6 py-2">Jumlah Buku</th>
                <th class="px-6 py-2">Tahun</th>
                <th class="px-6 py-2">Harga</th>
                <th class="px-6 py-2">Total</th>
            </tr>
        </thead>
        <tbody>
            @php
            $grandTotal = 0;
            @endphp

            @foreach ($laporananggaran as $item)
            <tr>
                <td class="px-6 py-2">{{ $loop->iteration }}</td>
                <td class="px-6 py-2">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                <td class="px-6 py-2">{{ $item->namanbuku }}</td>
                <td class="px-6 py-2">{{ $item->masterkategori->nama }}</td>
                <td class="px-6 py-2">{{ $item->keterangan }}</td>
                <td class="px-6 py-2">{{ $item->qty }}</td>
                <td class="px-6 py-2">{{ $item->tahun }}</td>
                <td class="px-6 py-2">Rp. {{ number_format($item->harga) }}</td>
                <td class="px-6 py-2">Rp. {{ number_format($item->qty * $item->harga) }}</td>
            </tr>
            @php
            $subTotal = $item->harga * $item->qty;
            $grandTotal += $subTotal;
            @endphp
            @endforeach

            <tr>
                <td colspan="8" class="grand total">GRAND TOTAL</td>
                <td class="grand total">Rp. {{ number_format($grandTotal) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="date-container">
        Banjarmasin, <span class="formatted-date">{{ now()->format('d-m-Y') }}</span>
    </div>
    <p class="signature">(Petugas)</p>
</body>

</html>
