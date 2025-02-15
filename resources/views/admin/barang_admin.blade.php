@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Items</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('tambahBarangAdmin') }}" class="btn btn-primary btn-icon-split mb-3">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add Items</span>
                    </a>


                    <div class="float-right">
                        <form action="" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="cari"
                                    value="{{ request()->cari }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        {{-- <i class="fas fa-search"></i> --}}
                                        Search
                                    </button>
                                    <button class="btn btn-secondary" type="button"
                                        onclick="window.location.href='{{ route('data_barang_admin') }}'">
                                        refresh
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Items</th>
                                    <th>Owner / Customer</th>
                                    <th>Description</th>
                                    <th>Model/Type/Part Number</th>
                                    <th>Serial Number</th>
                                    <th>Inventory / Register No.</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($data as $item)
                                <tbody>

                                    <tr>
                                        <td>{{ $item->kode_barang }}</td>
                                        <td>{{ $item->owner }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>{{ $item->model }}</td>
                                        <td>{{ $item->serial_number }}</td>
                                        <td>{{ $item->register_no }}</td>
                                        <td>
                                            <a href="{{ route('editBarangAdmin', $item->id) }}"
                                                class="btn btn-warning btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="{{ route('detail_barangadmin', $item->id) }}"
                                                class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                                <span class="text">detail</span>
                                            </a>
                                            <a href="{{ route('exportPDFperbarang', $item->id) }}"
                                                class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-print"></i>
                                                </span>
                                                <span class="text">Export</span>
                                            </a>
                                            <a href="#" onclick="hapus({{ $item->id }})"
                                                class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Delete</span>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            @endforeach
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function hapus(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/admin/hapus_barangadmin/` + id;
                }
            })
        }
    </script>
@endsection
