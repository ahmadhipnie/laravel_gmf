@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="col-lg-6 mb-3 mt-3">
                    <a href="{{ route('data_barang_inspector') }}" class="btn btn-danger">Back</a>
                </div>

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Daily Inspection</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('store_daily_inspection') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Choose Item</label>
                            <select name="id_barang" class="form-control" {{ isset($id_barang) ? 'disabled' : 'required' }}>
                                <option value="">choose item</option>
                                @foreach ($getDataBarangAll as $item)
                                    <option value="{{ $item->id }}" {{ isset($id_barang) && $id_barang == $item->id ? 'selected' : '' }}>{{ $item->deskripsi }}</option>
                                @endforeach
                            </select>
                            @if(isset($id_barang))
                                <input type="hidden" name="id_barang" value="{{ $id_barang }}">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Physical Condition</label>
                            <select name="physical_condition" class="form-control" required>
                                <option value="">Choose Condition</option>
                                <option value="good">good</option>
                                <option value="damage">damage</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Functioning Properly</label>
                            <select name="functioning_properly" class="form-control" required>
                                <option value="">choose</option>
                                <option value="yes">yes</option>
                                <option value="no">no</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Notes Finding</label>
                            <textarea name="notes_finding" class="form-control" placeholder="Masukkan Notes Finding" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Corrective Action Taken</label>
                            <textarea name="corrective_action_taken" class="form-control" placeholder="Masukkan Corrective Action Taken" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Additional Notes</label>
                            <textarea name="additional_notes" class="form-control" placeholder="Masukkan Additional Notes" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Follow Up Action</label>
                            <select name="follow_up_action" class="form-control" required>
                                <option value="">choose</option>
                                <option value="none">none</option>
                                <option value="repair">repair</option>
                                <option value="replacement">replacement</option>
                                <option value="further inspection">further inspection</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Save Daily Inspection</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
