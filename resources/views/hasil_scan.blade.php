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
            overflow: auto;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 90vw;
            width: 100%;
            overflow: auto;
            max-height: 90vh;
        }

        .tag {
            flex: 1;
            min-width: 350px;
            padding: 15px;
            border: 2px solid black;
            background: #fdf3dc;
            overflow-y: auto;
            max-height: 80vh;
        }

        .logo {
            text-align: center;
            margin-bottom: 10px;
        }

        .header {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            border-bottom: 2px solid black;
            padding-bottom: 5px;
        }

        .section {
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 5px;
        }

        .checkbox-container {
            display: flex;
            flex-wrap: wrap;
        }

        .checkbox-container label {
            width: 50%;
            display: flex;
            align-items: center;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        .image-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-left: 20px;
        }

        .image-container a {
            width: 100px;
            text-align: center;
        }


        .image-container img {
            width: 200px;
            height: auto;
            border: 2px solid black;
            max-width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 768px) {
            body {
                align-items: flex-start;
            }

            .container {
                flex-direction: column;
                align-items: center;
                max-height: none;
            }

            .image-container {
                margin-left: 0;
                margin-top: 15px;
            }

            .tag {
                width: 100%;
                max-height: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="tag">
            <div class="logo">
                <img src="{{ asset('img/img_logo_garuda.png') }}" alt="GMF AeroAsia" width="150" height="auto">
            </div>
            <div class="header">EQUIPMENT SERVICEABLE TAG</div>
            <div class="section">
                <p>Work Order Number: <strong>{{ $barang->work_order_number }}</strong></p>
                <p>Owner/Customer: <strong>{{ $barang->owner }}</strong></p>
                <p>Description: <strong>{{ $barang->deskripsi }}</strong></p>
            </div>
            <div class="section">
                <p>Model/Type/Part Number: <strong>{{ $barang->model }}</strong></p>
                <p>Serial Number: <strong>{{ $barang->serial_number }}</strong></p>
                <p>Manufacturer: <strong>{{ $barang->manufacturer }}</strong></p>
                <p>Inventory/Register No.: <strong>{{ $barang->register_no }}</strong></p>
            </div>
            <div class="section">
                <p>Release Inspection Date: <strong>{{ $barang->release_inspection_date }}</strong></p>
                <p>Next Inspection Date: <strong>{{ $barang->next_inspection_date }}</strong></p>
            </div>
            <div class="section">
                <strong>WORK PERFORMED</strong>
                <div class="checkbox-container">
                    <label><input type="checkbox" @if ($barang->cleaning == 1) checked @endif disabled>
                        Cleaning</label>
                    <label><input type="checkbox" @if ($barang->recheck == 1) checked @endif disabled>
                        Recheck</label>
                    <label><input type="checkbox" @if ($barang->lubricant == 1) checked @endif disabled>
                        Lubrication</label>
                    <label><input type="checkbox" @if ($barang->calibration == 1) checked @endif disabled>
                        Calibration/Test</label>
                    <label><input type="checkbox" @if ($barang->adjustment == 1) checked @endif disabled>
                        Adjustment</label>
                    <label><input type="checkbox" @if ($barang->modification == 1) checked @endif disabled>
                        Modification</label>
                    <label><input type="checkbox" @if ($barang->part_replacement == 1) checked @endif disabled> Part
                        Replacement</label>
                    <label><input type="checkbox" @if ($barang->repair == 1) checked @endif disabled>
                        Repair</label>
                </div>
            </div>
            <div class="section">
                <p><strong>*Tick the box as appropriate</strong></p>
                <p>
                    I here certify that the equipment identified above has been maintained as indicated in the box above
                    and found to meet applicable standards.
                </p>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Technician / Inspector</th>
                    </tr>
                    <tr>
                        <td>{{ $barang->inspection_date }}</td>
                        <td>
                            {{ $barang->technician_name }} <br>
                            <em>Name & Signature or Stamp</em>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="section" style="text-align: left;">
                <strong>Form No. GMF/Q-059 R3</strong>
            </div>
        </div>
        <div class="image-container">
            <img src="{{ asset('img/foto_barang/' . $barang->img_url) }}" alt="Equipment Image">

            <div style="margin-top: 10px;">
                <a href="{{ route('detail_barangscan', $barang->id) }}"
                    style="background-color: blue; color: white; text-decoration: none; padding: 8px 15px; border-radius: 5px; display: inline-block; text-align: center;">Detail</a>
            </div>
        </div>

    </div>
</body>

</html>
