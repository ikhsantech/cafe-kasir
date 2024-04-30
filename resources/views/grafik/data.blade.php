            @extends('templates.app')
            @section('content')
                <div class="container mt-5">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">


                                {{-- HEADER --}}
                                <div class="card-header">
                                    <h5 class="title">Dashboard</h5>
                                </div>
                                {{-- HEADER --}}

                                {{-- body  --}}
                                <div class="card-body">

                                    <div class="content">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="card card-stats">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-5 col-md-4">
                                                                <div class="icon-big text-center icon-warning">
                                                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-7 col-md-8">
                                                                <div class="numbers">
                                                                    <p class="card-category font-weight-bold"
                                                                        style="font-size: 14px;"> Total Data Jenis</p>
                                                                    <p class="card-title font-weight-bold"
                                                                        style="font-size: 18px;">{{ $count_tipe }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="card card-stats">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-5 col-md-4">
                                                                <div class="icon-big text-center icon-warning">
                                                                    <i class="nc-icon nc-globe text-warning"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-7 col-md-8">
                                                                <div class="numbers">
                                                                    <p class="card-category font-weight-bold"
                                                                        style="font-size: 14px;">Total Data Menu</p>
                                                                    <p class="card-title font-weight-bold"
                                                                        style="font-size: 18px;">{{ $count_menu }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="card card-stats">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-5 col-md-4">
                                                                <div class="icon-big text-center icon-warning">
                                                                    <i class="nc-icon nc-money-coins text-success"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-7 col-md-8">
                                                                <div class="numbers">
                                                                    <p class="card-category font-weight-bold"
                                                                        style="font-size: 14px;">Jumlah Transaksi</p>
                                                                    <p class="card-title font-weight-bold"
                                                                        style="font-size: 18px;">{{ $count_transaksi }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="card card-stats">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-5 col-md-4">
                                                                <div class="icon-big text-center icon-warning">
                                                                    <i class="fa fa-money text-success"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-7 col-md-8">
                                                                <div class="numbers">
                                                                    <p class="card-category font-weight-bold"
                                                                        style="font-size: 14px;">Total Pendapatan</p>
                                                                    <p class="card-title font-weight-bold"
                                                                        style="font-size: 18px;">{{ $pendapatan }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card ">
                                                    <div class="card-header ">
                                                        <h5 class="card-title">Users Behavior</h5>
                                                        <p class="card-category">24 Hours performance</p>
                                                    </div>
                                                    <div class="card-body ">

                                                        <canvas id="myChart" width="350" height="350"></canvas>
                                                        @push('js')
                                                            <script>
                                                                // Data penjualan per tanggal (contoh data)
                                                                var salesData = {
                                                                    labels: ['2024-04-01', '2024-04-02', '2024-04-03', '2024-04-04', '2024-04-05'], // Data tanggal
                                                                    datasets: [{
                                                                        label: 'Sales per Date',
                                                                        data: [100, 150, 200, 180, 220], // Data penjualan per tanggal
                                                                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna area grafik
                                                                        borderColor: 'rgba(255, 99, 132, 1)', // Warna garis grafik
                                                                        borderWidth: 1
                                                                    }]
                                                                };

                                                                // Inisialisasi Chart.js dengan data penjualan per tanggal
                                                                var ctx = document.getElementById('myChart').getContext('2d');
                                                                var myChart = new Chart(ctx, {
                                                                    type: 'line', // Jenis grafik (line, bar, pie, dll.)
                                                                    data: salesData, // Data penjualan per tanggal
                                                                    options: {
                                                                        scales: {
                                                                            yAxes: [{
                                                                                ticks: {
                                                                                    beginAtZero: true
                                                                                }
                                                                            }]
                                                                        }
                                                                    }
                                                                });
                                                            </script>
                                                        @endpush
                                                    </div>
                                                    <div class="card-footer ">
                                                        <hr>
                                                        <div class="stats">
                                                            <i class="fa fa-history"></i> Updated 3 minutes ago
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">


                                            <div class="col-md-4">
                                                <div class="card ">
                                                    <div class="card-header ">
                                                        <h5 class="card-title">Sisa Stok yang tersedia</h5>
                                                    </div>
                                                    <div class="card-body ">

                                                        <div>
                                                            <h4>Stok Terendah</h4>
                                                            <ul class="list-group">
                                                                @foreach ($stokTerendah as $stok)
                                                                    <li class="list-group-item">
                                                                        <span
                                                                            class="font-weight-bold">{{ $stok->menu->nama_menu }}</span>
                                                                        <span class="font-weight-bold">Stok:
                                                                            {{ $stok->jumlah }}</span>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>


                                                    </div>
                                                    <div class="card-footer ">
                                                        <hr>

                                                    </div>
                                                </div>
                                            </div>


                                            {{-- MENU LAKU --}}
                                            <div class="col-md-8">
                                                <div class="card">
                                                    <div class="card-header bg-primary text-white text-center">
                                                        <h5 class="card-title mb-0">Menu Paling Laku</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-8">
                                                                @foreach ($palingLaku as $lak)
                                                                    <div class="card mb-3" style="max-width: 18rem;">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title font-weight-bold">
                                                                                {{ $lak }}
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                @endforeach


                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <i class="fa fa-star-o fa-5x text-warning"></i>
                                                                <i class="fa fa-star-o fa-5x text-warning"></i>
                                                                <i class="fa fa-star-o fa-5x text-warning"></i>
                                                                <i class="fa fa-star-o fa-5x text-warning"></i>
                                                                <i class="fa fa-star-o fa-5x text-warning"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>

                                </div>
                                {{-- END body --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
