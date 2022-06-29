@extends('layouts.admin') @section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4
                class="page-title text-truncate text-dark font-weight-medium mb-1"
            >
                Data Wisata
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="text-muted">Admin</a>
                        </li>
                        <li
                            class="breadcrumb-item text-muted active"
                            aria-current="page"
                        >
                            Data Wisata
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
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Tipe</th>
                                    <th>Durasi</th>
                                    <th>Depature Date</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->location}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->duration}}</td>
                                    <td>{{$item->departure_date}}</td>
                                    <td>$ {{$item->price}}</td>
                                    <td>
                                        <a
                                            href="{{route('tour-package.edit', $item->id)}}"
                                            class="btn btn-primary"
                                        >
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form
                                            action="{{route('tour-package.destroy', $item->id)}}"
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
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Tipe</th>
                                    <th>Durasi</th>
                                    <th>Depature Date</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
