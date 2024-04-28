<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Nota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 15px 15px 0 0;
        }

        .card-footer {
            background-color: #007bff;
            color: #fff;
            border-radius: 0 0 15px 15px;
        }

        .table th,
        .table td {
            border-top: none;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-striped tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
    </style>
</head>

<body>
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4 text-center">
                <h4>Cafe In The Sky</h4>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h5 class="mb-3">Invoice</h5>
                        <div>{{ $transaksi->id }}</div>
                    </div>
                    <div class="col-sm-6 ">
                        <h6 class="mb-2">Tanggal</h6>
                        <div> {{ $transaksi->tanggal }}</div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Item</td>
                                <td>Qty</td>
                                <td>Harga</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi->detailTransaksi as $item)
                                <tr>
                                    <td>{{ $item->menu->nama_menu }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ number_format($item->menu->harga, 0, ',', '.') }}</td>
                                    <td>{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td>Total Harga :{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white ">
                <p class="mb-0">Cafe In The Sky</p>
            </div>
        </div>
    </div>
</body>

</html>
