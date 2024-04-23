<!DOCTYPE html>
<html>

<head>
    <style>
        #absensi {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #absensi td,
        #absensi th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #absensi tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #absensi tr:hover {
            background-color: #ddd;
        }

        #absensi th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #1bb4cf;
            color: white;
        }

        h2 {
            text-align: center
        }
    </style>
</head>

<body>

    <h2>DATA ABSENSI</h2>

    <table id="absensi">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Karyawan</th>
                <th scope="col">Tanggal Masuk </th>
                <th scope="col">Waktu Masuk Kerja</th>
                <th scope="col">Status</th>
                <th scope="col">Waktu Selesai Kerja</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensi as $ab)
                <tr>
                    <td scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $ab->nama_karyawan }}</td>
                    <td>{{ $ab->tanggal_masuk }}</td>
                    <td>{{ $ab->waktu_masuk }}</td>
                    <td>{{ $ab->status }}</td>
                    <td>{{ $ab->waktu_selesai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
