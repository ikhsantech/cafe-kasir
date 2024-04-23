<!DOCTYPE html>
<html>

<head>
    <style>
        #tipe {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tipe td,
        #tipe th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #tipe tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #tipe tr:hover {
            background-color: #ddd;
        }

        #tipe th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        h2 {
            text-align: center
        }
    </style>
</head>

<body>

    <h2>DATA JENIS</h2>

    <table id="tipe">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Jenis</th>
                <th scope="col">Kategori ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipe as $ti)
                <tr>
                    <td scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $ti->nama_jenis }}</td>
                    <td>{{ $ti->kategori->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
