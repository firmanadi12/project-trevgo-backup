@extends('layouts.admin') @section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4
                class="page-title text-truncate text-dark font-weight-medium mb-1"
            >
                Transaksi
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}" class="text-muted">Admin</a>
                        </li>
                        <li
                            class="breadcrumb-item text-muted active"
                            aria-current="page"
                        >
                            Transaksi
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- basic table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            id="zero_config"
                            class="table table-striped table-bordered no-wrap"
                        >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Wisata</th>
                                    <th>User</th>
                                    <th>Visa</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->tour_package->title}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>$ {{$item->additional_visa}}</td>
                                    <td>$ {{$item->transaction_total}}</td>
                                    <td>{{$item->transaction_status}}</td>
                                    <td>
                                        <a
                                            href="{{route('transaction.show', $item->id)}}"
                                            class="btn btn-light"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a
                                            href="{{route('transaction.edit', $item->id)}}"
                                            class="btn btn-primary"
                                        >
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form
                                            action="{{route('transaction.destroy', $item->id)}}"
                                            method="POST"
                                            class="d-inline"
                                        >
                                            @csrf @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Tidak ada data
                                    </td>
                                </tr>

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
