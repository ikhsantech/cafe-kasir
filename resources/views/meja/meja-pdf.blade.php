<!DOCTYPE html>
<html>

<head>
    <style>
        #meja {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #meja td,
        #meja th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #meja tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #meja tr:hover {
            background-color: #ddd;
        }

        #meja th {
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

    <h2>DATA MEJA</h2>

    <table id="meja">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Meja</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meja as $mej)
                <tr>
                    <td scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $mej->nomor_meja }}</td>
                    <td>{{ $mej->kapasitas }}</td>
                    <td>{{ $mej->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
