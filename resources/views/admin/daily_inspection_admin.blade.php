@extends('layout.app')

@section('title', 'Daily Inspection')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daily Inspection</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Inspector Name</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Inspeksi</th>
                            <th>Physical Condition</th>
                            <th>Functioning Properly</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllDailyInspection as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->id }}</td>
                                <td>{{ $u->nama_user }}</td>
                                <td>{{ $u->nama_barang }}</td>
                                <td>{{ $u->date }}</td>
                                <td>{{ $u->physical_condition }}</td>
                                <td>{{ $u->functioning_properly }}</td>
                                <td>
                                    <a href="{{ route('detail_daily_inspection_admin', $u->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.last_inspection.destroy', $u->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush


