<!DOCTYPE html>
<html>

<head>
    <style>
        #kategori {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #kategori td,
        #kategori th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #kategori tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #kategori tr:hover {
            background-color: #ddd;
        }

        #kategori th {
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

    <h2>DATA KATEGORI</h2>

    <table id="kategori">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $kat)
                <tr>
                    <td scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $kat->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
