@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="col-lg-6 mb-3 mt-3">
                    <a href="{{ route('data_barang_admin') }}" class="btn btn-danger">Kembali</a>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('tambahBarangAdminpost') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" placeholder="Masukkan Kode Barang" value="{{ old('kode_barang') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Work Order Number</label>
                            <input type="text" name="work_order_number" class="form-control" placeholder="Masukkan Work Order Number" required value="{{ old('work_order_number') }}">
                        </div>

                        <div class="form-group">
                            <label>Owner</label>
                            <input type="text" name="owner" class="form-control" placeholder="Masukkan Owner" required value="{{ old('owner') }}">
                        </div>

                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control" placeholder="Masukkan Model" required value="{{ old('model') }}">
                        </div>

                        <div class="form-group">
                            <label>Serial Number</label>
                            <input type="text" name="serial_number" class="form-control" placeholder="Masukkan Serial Number" required value="{{ old('serial_number') }}">
                        </div>

                        <div class="form-group">
                            <label>Register No</label>
                            <input type="text" name="register_no" class="form-control" placeholder="Masukkan Register No" required value="{{ old('register_no') }}">
                        </div>

                        <div class="form-group">
                            <label>Last Inspection Date</label>
                            <input type="date" name="last_inspection_date" class="form-control" value="{{ old('last_inspection_date') }}">
                        </div>

                        <div class="form-group">
                            <label>Release Inspection Date</label>
                            <input type="date" name="release_inspection_date" class="form-control" value="{{ old('release_inspection_date') }}">
                        </div>

                        <div class="form-group">
                            <label>Next Inspection Date</label>
                            <input type="date" name="next_inspection_date" class="form-control" value="{{ old('next_inspection_date') }}">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukkan Deskripsi">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Panjang (cm)</label>
                            <input type="number" step="0.01" name="panjang" class="form-control" placeholder="Masukkan Panjang" value="{{ old('panjang') }}">
                        </div>

                        <div class="form-group">
                            <label>Lebar (cm)</label>
                            <input type="number" step="0.01" name="lebar" class="form-control" placeholder="Masukkan Lebar" value="{{ old('lebar') }}">
                        </div>

                        <div class="form-group">
                            <label>Tinggi (cm)</label>
                            <input type="number" step="0.01" name="tinggi" class="form-control" placeholder="Masukkan Tinggi" value="{{ old('tinggi') }}">
                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" placeholder="Masukkan Lokasi" value="{{ old('location') }}">
                        </div>

                        <div class="form-group">
                            <label>Upload Gambar</label>
                            <input type="file" name="img_url" class="form-control-file" id="imgInput">
                            <br>
                            <img id="previewImg" src="" alt="Preview Gambar" style="max-width: 200px; display: none; margin-top: 10px;">
                        </div>

                        <div class="form-group">
                            <label>Pilih Opsi Perawatan:</label><br>
                            <div class="form-check">
                                <input type="checkbox" name="cleaning" value="1" class="form-check-input"  >
                                <label class="form-check-label">Cleaning</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="lubricant" value="1" class="form-check-input">
                                <label class="form-check-label">Lubricant</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="adjustment" value="1" class="form-check-input">
                                <label class="form-check-label">Adjustment</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="part_replacement" value="1" class="form-check-input">
                                <label class="form-check-label">Part Replacement</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="recheck" value="1" class="form-check-input">
                                <label class="form-check-label">Recheck</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="calibration" value="1" class="form-check-input" id="calibration">
                                <label class="form-check-label">Calibration</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="modification" value="1" class="form-check-input" id="modification">
                                <label class="form-check-label" for="modification">Modification</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="repair" value="1" class="form-check-input" id="repair">
                                <label class="form-check-label" for="repair">Repair</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Simpan Barang</button>

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
