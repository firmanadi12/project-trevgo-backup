@extends('layouts.admin')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                Detail Transaksi
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}" class="text-muted">Admin</a>
                        </li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            Detail Transaksi
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$item->user->name}}</h3>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <tr>
                                <th>ID</th>
                                <td>{{ $item->id }}</td>
                            </tr>
                            <tr>
                                <th>Wisata</th>
                                <td>{{ $item->tour_package->title }}</td>
                            </tr>
                            <tr>
                                <th>Pembeli</th>
                                <td>{{ $item->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Additional Visa</th>
                                <td>${{ $item->additional_visa }}</td>
                            </tr>
                            <tr>
                                <th>Total Transaksi</th>
                                <td>${{ $item->transaction_total }}</td>
                            </tr>
                            <tr>
                                <th>Status Transaksi</th>
                                <td>{{ $item->transaction_status }}</td>
                            </tr>
                            <tr>
                                <th>Pembelian</th>
                                <td>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Nationality</th>
                                            <th>Visa</th>
                                            <th>DOE Passport</th>
                                        </tr>
                                        @foreach($item->details as $detail)
                                        <tr>
                                            <td>{{ $detail->id }}</td>
                                            <td>{{ $detail->username }}</td>
                                            <td>{{ $detail->nationality }}</td>
                                            <td>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                            <td>{{ $detail->doe_passport }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection