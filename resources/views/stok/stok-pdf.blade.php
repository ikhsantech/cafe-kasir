<!DOCTYPE html>
<html>

<head>
    <style>
        #stok {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #stok td,
        #stok th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #stok tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #stok tr:hover {
            background-color: #ddd;
        }

        #stok th {
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

    <h2>DATA STOK</h2>

    <table id="stok">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Menu Id</th>
                <th scope="col">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stok as $sto)
                <tr>
                    <td scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $sto->menu_id }}</td>
                    <td>{{ $sto->jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
