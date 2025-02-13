@extends('layout.app')

@section('title', 'Data Inspector')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Inspector</h6>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addInspectorModal">Tambah Inspector</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nama Inspector</th>
                            <th>NIP</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllInspector as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->id }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->nip }}</td>
                                <td>*****</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editInspectorModal{{ $u->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.inspector.destroy', $u->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editInspectorModal{{ $u->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.inspector.update', $u->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Inspector</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nip">NIP</label>
                                                    <input type="text" class="form-control" name="nip" value="{{ $u->nip }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Nama Inspector</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $u->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                                                    <input type="password" class="form-control" name="password" minlength="8">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addInspectorModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('tambah_inspector_admin') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Inspector</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" name="nip" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Inspector</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" minlength="8" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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


