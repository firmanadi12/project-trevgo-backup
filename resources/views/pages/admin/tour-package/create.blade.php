@extends('layouts.admin') @section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                Tambah Wisata
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="text-muted">Admin</a>
                        </li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">
                            Tambah Wisata
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
                    <form action="{{ route('tour-package.store') }}" method="post" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title"
                                value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Location"
                                value="{{ old('location') }}" />
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea name="about" rows="10" id="editor" class="form-control">
                            {{ old('about') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="featured_event">Featured Event</label>
                            <input type="text" class="form-control" name="featured_event" placeholder="Featured Event"
                                value="{{ old('featured_event') }}" />
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" class="form-control" name="language" placeholder="Language"
                                value="{{ old('language') }}" />
                        </div>
                        <div class="form-group">
                            <label for="foods">Foods</label>
                            <input type="text" class="form-control" name="foods" placeholder="Foods"
                                value="{{ old('foods') }}" />
                        </div>
                        <div class="form-group">
                            <label for="departure_date">Departure Date</label>
                            <input type="date" class="form-control" name="departure_date" placeholder="Departure Date"
                                value="{{ old('departure_date') }}" />
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" class="form-control" name="duration" placeholder="Duration"
                                value="{{ old('duration') }}" />
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type" placeholder="Type"
                                value="{{ old('type') }}" />
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Price"
                                value="{{ old('price') }}" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('addon-sctipt')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>    
@endpush