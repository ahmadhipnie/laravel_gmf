<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Serviceable Tag</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
            padding: 10px;
        }

        .container {
            display: flex;
            background: white;
            padding: 0;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            flex-wrap: wrap;
        }

        .tag {
            flex: 1;
            padding: 0;
            border: 2px solid black;
            background: #fdf3dc;
            max-width: 500px;
        }

        .logo {
            text-align: center;
            padding: 10px;
            border-bottom: 2px solid black;
        }

        .header {
            text-align: center;
            font-weight: bold;
            border-bottom: 2px solid black;
            padding: 10px;
        }

        .section {
            border-bottom: 2px solid black;
            padding: 10px;
        }

        .checkbox-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 5px;
        }

        label {
            display: flex;
            align-items: center;
            cursor: pointer;
            margin-bottom: 5px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        .image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            border-left: 2px solid black;
            padding: 10px;
        }

        .image-container img {
            width: 200px;
            border: 2px solid black;
        }

        .image-container a {
            margin-top: 10px;
            background-color: blue;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .image-container {
                border-left: none;
                border-top: 2px solid black;
            }
        }


        .info-table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        .inspection-table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        text-align: center;
    }
    .inspection-table td {
        border: 1px solid black;
        padding: 10px;
        vertical-align: middle;
        font-weight: bold;
    }
    .inspection-table th {
        border: 1px solid black;
        padding: 5px;
       /* Warna background mirip gambar */
        font-weight: normal;
    }

        .info-table td {
            padding: 5px;
            vertical-align: top;
        }

        .info-table td:first-child {
            width: 200px;
        }

        .info-table strong {
            display: inline-block;
            min-width: 150px;
            border-bottom: 1px solid black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="tag">
            <div class="logo">
                <img src="{{ asset('img/fix_hitam.png') }}" alt="GMF AeroAsia" width="150">
            </div>
            <div class="header">EQUIPMENT SERVICEABLE TAG</div>
            <div class="section">
                <table class="info-table">
                    <tr>
                        <td>Work Order Number</td>
                        <td>: <strong>{{ $barang->work_order_number }}</strong></td>
                    </tr>
                    <tr>
                        <td>Owner/Customer</td>
                        <td>: <strong>{{ $barang->owner }}</strong></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>: <strong>{{ $barang->deskripsi }}</strong></td>
                    </tr>
                    <tr>
                        <td>Model/Type/Part Number</td>
                        <td>: <strong>{{ $barang->model }}</strong></td>
                    </tr>
                    <tr>
                        <td>Serial Number</td>
                        <td>: <strong>{{ $barang->serial_number }}</strong></td>
                    </tr>
                    <tr>
                        <td>Manufacturer</td>
                        <td>: <strong>{{ $barang->manufacturer }}</strong></td>
                    </tr>
                    <tr>
                        <td>Inventory/Register No.</td>
                        <td>: <strong>{{ $barang->register_no }}</strong></td>
                    </tr>
                </table>
            </div>

                <table class="inspection-table">
                    <tr>
                        <th>Release Inspection Date :</th>
                        <th>Next Inspection Date :</th>
                    </tr>
                    <tr>
                        <td>{{ $barang->release_inspection_date }}</td>

                        @if (date('Y-m-d') >= $barang->next_inspection_date)

                        <td style="color: red">{{ $barang->next_inspection_date }}</td>
                        @else

                        <td>{{ $barang->next_inspection_date }}</td>
                        @endif
                    </tr>
                </table>

            <div class="section">
                <strong style="text-align: center; display: block; margin-bottom: 30px;">WORK PERFORMED</strong>
                <div class="checkbox-container">
                    <label><input type="checkbox" @if ($barang->cleaning) checked @endif disabled>
                        Cleaning</label>
                    <label><input type="checkbox" @if ($barang->recheck) checked @endif disabled>
                        Recheck</label>
                    <label><input type="checkbox" @if ($barang->lubricant) checked @endif disabled>
                        Lubrication</label>
                    <label><input type="checkbox" @if ($barang->calibration) checked @endif disabled>
                        Calibration/Test</label>
                    <label><input type="checkbox" @if ($barang->adjustment) checked @endif disabled>
                        Adjustment</label>
                    <label><input type="checkbox" @if ($barang->modification) checked @endif disabled>
                        Modification</label>
                    <label><input type="checkbox" @if ($barang->part_replacement) checked @endif disabled> Part
                        Replacement</label>
                    <label><input type="checkbox" @if ($barang->repair) checked @endif disabled>
                        Repair</label>


                        <p><strong>*)Tick the box as appropriate</strong></p>
                </div>



            </div>
            <div class="section">

                <p>I certify that the equipment has been maintained as indicated above and meets applicable standards.
                </p>
            </div>
            <div class="section">
                <table>
                    <tr>
                        <th>Date</th>
                        <th style="text-align: right;">Technician / Inspector</th>
                    </tr>
                    <tr>
                        <td>Y INSP</td>
                        <td style="text-align: right;">{{ $barang->technician_name }} <br><em>Name & Signature or
                                Stamp</em></td>
                    </tr>
                </table>
            </div>
            <div class="section"><strong>Form No. GMF/Q-059 R3</strong></div>
        </div>
        <div class="image-container">
            <img src="{{ asset('img/foto_barang/' . $barang->img_url) }}" alt="Equipment Image">
            <a href="{{ route('detail_barangscan', $barang->id) }}">Detail</a>
        </div>
    </div>
</body>

</html>
