@extends('layout.app')

@section('title', 'Last Inspection')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Last Inspection</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Inspector Name</th>
                            <th>Item Name</th>
                            <th>Inspection Date</th>
                            <th>Last Know Condition</th>
                            <th>Follow Up Action</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllLastInspection as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->id }}</td>
                                <td>{{ $u->user->name }}</td>
                                <td>{{ $u->barang->deskripsi }}</td>
                                <td>{{ $u->date_of_last_inspection }}</td>
                                <td>{{ $u->last_know_condition }}</td>
                                <td>{{ $u->follow_up_action }}</td>
                                <td>
                                    <a href="{{ route('detail_last_inspection_admin', $u->id) }}" class="btn btn-info btn-sm">
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


