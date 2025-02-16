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
                            <td>{{ $dailyInspection->id }}</td>
                        </tr>
                        <tr>
                            <th>Inspector Name</th>
                            <td>{{ $dailyInspection->nama_user }}</td>
                        </tr>
                        <tr>
                            <th>Item Name</th>
                            <td>{{ $dailyInspection->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th>Inspection Date</th>
                            <td>{{ $dailyInspection->date }}</td>
                        </tr>
                        <tr>
                            <th>Physical Condition</th>
                            <td>{{ $dailyInspection->physical_condition }}</td>
                        </tr>
                        <tr>
                            <th>Functioning Properly</th>
                            <td>{{ $dailyInspection->functioning_properly }}</td>
                        </tr>
                        <tr>
                            <th>Notes Finding</th>
                            <td>{{ $dailyInspection->notes_finding }}</td>
                        </tr>
                        <tr>
                            <th>Corrective Action Taken</th>
                            <td>{{ $dailyInspection->corrective_action_taken }}</td>
                        </tr>
                        <tr>
                            <th>Additional Notes</th>
                            <td>{{ $dailyInspection->additional_notes }}</td>
                        </tr>
                        <tr>
                            <th>Follow Up Action</th>
                            <td>{{ $dailyInspection->follow_up_action }}</td>
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


