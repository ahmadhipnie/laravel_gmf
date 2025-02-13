@extends('layout.app')

@section('title', 'Detail Last Inspection')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $lastInspection->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama Inspector</th>
                            <td>{{ $lastInspection->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td>{{ $lastInspection->barang->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Inspeksi</th>
                            <td>{{ $lastInspection->date_of_last_inspection }}</td>
                        </tr>
                        <tr>
                            <th>Last Know Condition</th>
                            <td>{{ $lastInspection->last_know_condition }}</td>
                        </tr>
                        <tr>
                            <th>Functioning Properly</th>
                            <td>{{ $lastInspection->functioning_properly }}</td>
                        </tr>
                        <tr>
                            <th>Notes Finding</th>
                            <td>{{ $lastInspection->notes_finding }}</td>
                        </tr>
                        <tr>
                            <th>Corrective Action Taken</th>
                            <td>{{ $lastInspection->corrective_action_taken }}</td>
                        </tr>
                        <tr>
                            <th>Additional Notes</th>
                            <td>{{ $lastInspection->additional_notes }}</td>
                        </tr>
                        <tr>
                            <th>Follow Up Action</th>
                            <td>{{ $lastInspection->follow_up_action }}</td>
                        </tr>
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


