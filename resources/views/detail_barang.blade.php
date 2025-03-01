<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <a href="{{ route('hasil_scan',$barang->kode_barang ) }}" class="btn btn-danger mb-3">Back</a>

        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h6 class="m-0">Detail Item</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-header bg-primary text-white">Information Item</div>
                            <div class="card-body">
                                <p><strong>Code Item:</strong> {{ $barang->kode_barang }}</p>
                                    <p><strong>Work Order Number:</strong> {{ $barang->work_order_number }}</p>
                                    <p><strong>Owner:</strong> {{ $barang->owner }}</p>
                                    <p><strong>Model:</strong> {{ $barang->model }}</p>
                                    <p><strong>Serial Number:</strong> {{ $barang->serial_number }}</p>
                                    <p><strong>Register No:</strong> {{ $barang->register_no }}</p>
                                    <p><strong>Last Inspection Date:</strong> {{ $barang->last_inspection_date }}</p>
                                    <p><strong>Release Inspection Date:</strong> {{ $barang->release_inspection_date }}</p>
                                    <p><strong>Next Inspection Date:</strong> {{ $barang->next_inspection_date }}</p>
                                    <p><strong>Deskripsi:</strong> {{ $barang->deskripsi }}</p>
                                    <p><strong>Long:</strong> {{ $barang->panjang }} m</p>
                                    <p><strong>Width:</strong> {{ $barang->lebar }} m</p>
                                    <p><strong>Height:</strong> {{ $barang->tinggi }} m</p>
                                    <p><strong>Location:</strong> {{ $barang->location }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-header bg-success text-white">Image Item</div>
                            <div class="card-body text-center">
                                @if ($barang->img_url)
                                <img src="{{ asset('img/foto_barang/' . $barang->img_url) }}" class="img-fluid rounded" style="max-width: 100%;">
                            @else
                                <p class="text-muted">No Image Available</p>
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-header bg-warning text-white">QR Code</div>
                            <div class="card-body text-center">
                                {!! QrCode::size(200)->generate(url('/barang/' . $barang->kode_barang)) !!}
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-header bg-info text-white">Option Controll</div>
                            <div class="card-body">
                                <ul>
                                    @if ($barang->cleaning) <li>Cleaning</li> @endif
                                        @if ($barang->lubricant) <li>Lubricant</li> @endif
                                        @if ($barang->adjustment) <li>Adjustment</li> @endif
                                        @if ($barang->part_replacement) <li>Part Replacement</li> @endif
                                        @if ($barang->recheck) <li>Recheck</li> @endif
                                        @if ($barang->calibration) <li>Calibration</li> @endif
                                        @if ($barang->modification) <li>Modification</li> @endif
                                        @if ($barang->repair) <li>Repair</li> @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
