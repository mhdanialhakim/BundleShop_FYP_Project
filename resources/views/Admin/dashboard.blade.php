@extends('layout.adminInterface')
@section('linkPages')
<div class="col-sm-6 p-md-0">
    <div class="welcome-text">
        <h4>Hi, {{ Auth::user()->name }}.</h4>
        <p class="mb-0">Thieves Thirft's Admin</p>
    </div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</div>
@endsection

@section('dashboard')
<div class="col-lg-6 col-sm-6">
    <div class="card">
        <div class="stat-widget-one card-body">
            <div class="stat-icon d-inline-block">
                <i class="ti-money text-info border-info"></i>
            </div>
            <div class="stat-content d-inline-block">
                <div class="stat-text">Profit</div>
                <div class="stat-digit">RM {{ $totalSale }}.00</div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-sm-6">
    <div class="card">
        <div class="stat-widget-one card-body">
            <div class="stat-icon d-inline-block">
                <i class="ti-money text-info border-info"></i>
            </div>
            <div class="stat-content d-inline-block">
                <div class="stat-text">This Month ({{ date('F') }}) Profit</div>
                <div class="stat-digit">RM {{ $saleMonthly}}.00</div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-sm-6">
    <div class="card">
        <div class="stat-widget-one card-body">
            <div class="stat-icon d-inline-block">
                <i class="ti-receipt text-secondary border-secondary"></i>
            </div>
            <div class="stat-content d-inline-block">
                <div class="stat-text">Total Order</div>
                <div class="stat-digit">{{ $totalOrder }}</div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-sm-6">
    <div class="card">
        <div class="stat-widget-one card-body">
            <div class="stat-icon d-inline-block">
                <i class="ti-package text-dark border-dakr"></i>
            </div>
            <div class="stat-content d-inline-block">
                <div class="stat-text">New Order</div>
                <div class="stat-digit">{{ $preparingOrder }}</div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-lg-3 col-sm-6">
    <div class="card">
        <div class="stat-widget-one card-body">
            <div class="stat-icon d-inline-block">
                <i class="ti-truck text-warning border-warning"></i>
            </div>
            <div class="stat-content d-inline-block">
                <div class="stat-text">Delivered Order</div>
                <div class="stat-digit">{{ $receiveOrder }}</div>
            </div>
        </div>
    </div>
</div> --}}
<div class="col-lg-3 col-sm-6">
    <div class="card">
        <div class="stat-widget-one card-body">
            <div class="stat-icon d-inline-block">
                <i class="ti-check text-success border-success"></i>
            </div>
            <div class="stat-content d-inline-block">
                <div class="stat-text">Received Order</div>
                <div class="stat-digit">{{ $receiveOrder }}</div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-sm-6">
    <div class="card">
        <div class="stat-widget-one card-body">
            <div class="stat-icon d-inline-block">
                <i class="ti-alert text-danger border-danger"></i>
            </div>
            <div class="stat-content d-inline-block">
                <div class="stat-text">Canceled Order</div>
                <div class="stat-digit">{{ $cancelOrder }}</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

{!! $data['chart']->container() !!}

<script src="{{ $data['chart']->cdn() }}"></script>
{{ $data['chart']->script() }}
<br>
{{-- <br>
{!! $monthltData['chart']->container() !!}

<script src="{{ $monthltData['chart']->cdn() }}"></script>
{{ $monthltData['chart']->script() }} --}}
@endsection