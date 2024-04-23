<!DOCTYPE html>
<html>

<head>
    <style>
        #pelanggan {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #pelanggan td,
        #pelanggan th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #pelanggan tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #pelanggan tr:hover {
            background-color: #ddd;
        }

        #pelanggan th {
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

    <h2>DATA PELANGGAN</h2>

    <table id="pelanggan">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $pel)
                <tr>
                    <td scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $pel->nama }}</td>
                    <td>{{ $pel->email }}</td>
                    <td>{{ $pel->nomor_telepon }}</td>
                    <td>{{ $pel->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
