@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="col-lg-6 mb-3 mt-3">
                    <a href="{{ route('data_barang_admin') }}" class="btn btn-danger">Back</a>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Item</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateBarangAdmin', $barang->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Code Item</label>
                            <input type="text" name="kode_barang" class="form-control" placeholder="Enter Code Barang" value="{{ $barang->kode_barang }}" required>
                        </div>

                        <div class="form-group">
                            <label>Work Order Number</label>
                            <input type="text" name="work_order_number" class="form-control" placeholder="Enter Work Order Number" required value="{{ $barang->work_order_number }}">
                        </div>

                        <div class="form-group">
                            <label>Owner</label>
                            <input type="text" name="owner" class="form-control" placeholder="Enter Owner" required value="{{ $barang->owner }}">
                        </div>

                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control" placeholder="Enter Model" required value="{{ $barang->model }}">
                        </div>

                        <div class="form-group">
                            <label>Serial Number</label>
                            <input type="text" name="serial_number" class="form-control" placeholder="Enter Serial Number" required value="{{ $barang->serial_number }}">
                        </div>

                        <div class="form-group">
                            <label>Register No</label>
                            <input type="text" name="register_no" class="form-control" placeholder="Enter Register No" required value="{{ $barang->register_no }}">
                        </div>
                        <div class="form-group">
                            <label>Manufacturer</label>
                            <input type="text" name="manufacturer" class="form-control" placeholder="Enter Manufacturer" required value="{{ $barang->manufacturer }}">
                        </div>
                        <div class="form-group">
                            <label>Last Inspection Date</label>
                            <input type="date" name="last_inspection_date" class="form-control" value="{{ $barang->last_inspection_date }}">
                        </div>

                        <div class="form-group">
                            <label>Release Inspection Date</label>
                            <input type="date" name="release_inspection_date" class="form-control" value="{{ $barang->release_inspection_date }}">
                        </div>

                        <div class="form-group">
                            <label>Next Inspection Date</label>
                            <input type="date" name="next_inspection_date" class="form-control" value="{{ $barang->next_inspection_date }}">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Enter Deskripsi">{{ $barang->deskripsi }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Long (m)</label>
                            <input type="number" step="0.01" name="panjang" class="form-control" placeholder="Enter long" value="{{ $barang->panjang }}">
                        </div>

                        <div class="form-group">
                            <label>Width (m)</label>
                            <input type="number" step="0.01" name="lebar" class="form-control" placeholder="Enter width" value="{{ $barang->lebar }}">
                        </div>

                        <div class="form-group">
                            <label>Height (m)</label>
                            <input type="number" step="0.01" name="tinggi" class="form-control" placeholder="Enter heiht" value="{{ $barang->tinggi }}">
                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" placeholder="Enter location" value="{{ $barang->location }}">
                        </div>

                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="img_url" class="form-control-file" id="imgInput">
                            <br>
                            <img id="previewImg" src="{{ asset('img/foto_barang/' . $barang->img_url) }}" alt="Preview Gambar" style="max-width: 200px; display: none; margin-top: 10px;">
                        </div>


                        <div class="form-group">
                            <label>Choose Work Performed:</label><br>

                            @php
                                $perawatan = ['cleaning', 'lubricant', 'adjustment', 'part_replacement', 'recheck', 'calibration', 'modification', 'repair'];
                            @endphp

                            @foreach ($perawatan as $opsi)
                                <input type="hidden" name="{{ $opsi }}" value="0">
                                <div class="form-check">
                                    <input type="checkbox" name="{{ $opsi }}" value="1" class="form-check-input"
                                        {{ old($opsi, $barang->$opsi) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ ucfirst(str_replace('_', ' ', $opsi)) }}</label>
                                </div>
                            @endforeach
                        </div>



                        <button type="submit" class="btn btn-primary btn-block">Save Item</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('imgInput').addEventListener('change', function(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function(){
                var img = document.getElementById('previewImg');
                img.src = reader.result;
                img.style.display = "block";
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endsection
