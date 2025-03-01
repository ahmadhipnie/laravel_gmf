
@extends('layout.app')

@section('title', 'Dashboard')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Last Inspection</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBarangTelahDiInspeksi}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Daily Inspection</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBarangTelahDiInspeksiDaily }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-line-chart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>






@endsection


{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
