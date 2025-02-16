<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Label Barang</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .label { width: 300px; padding: 10px; border: 1px solid black; }
        .logo { width: 100px; }
        .qr-code { width: 100px; margin-top: 10px; }
        .info { font-size: 14px; text-align: left; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="label">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/img_logo_garuda.png' ))) }}" width="150">
        <h3>{{ $barang->nama }}</h3>
        <p class="info">
            Owner : {{ $barang->owner }} <br>
            Description : {{ $barang->deskripsi }} <br>
            Serial Number : {{ $barang->serial_number }} <br>
            Model : {{ $barang->model }}
        </p>
        {{-- @dd($barang->qr_code, public_path('/img/foto_qr/' . $barang->qr_code)); --}}

        <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(200)->generate(url('/barang/' . $barang->kode_barang))) }}" width="150">


    </div>
</body>
</html>
