@extends('layout.app')

@section('title', 'Daily Inspection History')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daily Inspection History</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Item Name</th>
                            <th>Physical Condition</th>
                            <th>Functioning Properly</th>
                            <th>Notes Finding</th>
                            <th>Corrective Action Taken</th>
                            <th>Additional Notes</th>
                            <th>Follow Up Action</th>
                        </tr>
                    </thead>
                    @foreach ($getDataDailyInspectionByIdUser as $item)
                        <tbody>

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->physical_condition }}</td>
                                <td>{{ $item->functioning_properly }}</td>
                                <td>{{ $item->notes_finding }}</td>
                                <td>{{ $item->corrective_action_taken }}</td>
                                <td>{{ $item->additional_notes }}</td>
                                <td>{{ $item->follow_up_action }}</td>
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

