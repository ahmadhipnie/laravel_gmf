@extends('layout.app')

@section('title', 'Data Items')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Items</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Item</th>
                            <th>Owner / Customer</th>
                            <th>Description</th>
                            <th>Model/Type/Part Number</th>
                            <th>Serial Number</th>
                            <th>Inventory / Register No.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($getDataBarangAll as $item)
                        <tbody>

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->owner }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->model }}</td>
                                <td>{{ $item->serial_number }}</td>
                                <td>{{ $item->register_no }}</td>
                                <td>
                                    <a href="{{ route('tambah_daily_inspection',['id_barang' => $item->id]) }}" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Add Daily Inspection</span>
                                    </a>
                                    <a href="{{ route('tambah_last_inspection',['id_barang' => $item->id]) }}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Add Last Inspection</span>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>



    @endsection
    @push('css')
        <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
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

