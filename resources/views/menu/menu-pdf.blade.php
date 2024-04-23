<!DOCTYPE html>
<html>

<head>
    <style>
        #menu {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #menu td,
        #menu th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #menu tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #menu tr:hover {
            background-color: #ddd;
        }

        #menu th {
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

    <h2>DATA MENU</h2>

    <table id="menu">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Jenis Id</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menu as $men)
                <tr>
                    <td scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $men->nama_menu }}</td>
                    <td>{{ $men->harga }}</td>
                    <td>{{ $men->deskripsi }}</td>
                    <td>{{ $men->tipe->nama_jenis }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
