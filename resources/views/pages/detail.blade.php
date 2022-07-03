@extends('layouts.app')

@section('title')
Detail Wisata
@endsection

@section('content')
<main>
  <section class="section section-details-header"></section>
  <section class="section section-details-content">
    <div class="container">
      <div class="row">
        <div class="col p-0">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                Wisata
              </li>
              <li class="breadcrumb-item active">
                Details
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"
            style="text-align: justify">
            <h1>{{$item->title}}</h1>
            <p>
              {{$item->location}}
            </p>

            @if ($item->galleries->count())
            <div class="gallery">
              <div class="xzoom-container">
                <img class="xzoom" id="xzoom-default" src="{{Storage::url($item->galleries->first()->image)}}"
                  xoriginal="{{Storage::url($item->galleries->first()->image)}}" />
                <div class="xzoom-thumbs">
                  @foreach ($item->galleries as $gallery)
                  <a href="{{Storage::url($gallery->image)}}">
                    <img class="xzoom-gallery" width="128" src="{{Storage::url($gallery->image)}}"
                      xpreview="{{Storage::url($gallery->image)}}" />
                  </a>
                  @endforeach
                </div>
              </div>
            </div>
            @endif

            <p>
              {!! $item->about !!}
            </p>
            <div class="features row pt-3">
              <div class="col-md-4">
                <img src="{{url('frontend/images/ic_event.png')}}" alt="" class="features-image" />
                <div class="description">
                  <h3>Featured Event</h3>
                  <p>{{$item->featured_event}}</p>
                </div>
              </div>
              <div class="col-md-4 border-left">
                <img src="{{url('frontend/images/ic_bahasa.png')}}" alt="" class="features-image" />
                <div class="description">
                  <h3>Language</h3>
                  <p>{{$item->language}}</p>
                </div>
              </div>
              <div class="col-md-4 border-left">
                <img src="{{url('frontend/images/ic_foods.png')}}" alt="" class="features-image" />
                <div class="description">
                  <h3>Foods</h3>
                  <p>{{$item->foods}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
          <div class="card card-details card-right">
            <h2>Booking Wisata</h2>
            <div class="members my-2">
              <img src="{{asset('frontend/images/member-icon/member-1.png')}}" class="member-image mr-1">
              <img src="{{asset('frontend/images/member-icon/member-2.png')}}" class="member-image mr-1">
              <img src="{{asset('frontend/images/member-icon/member-3.png')}}" class="member-image mr-1">
              <img src="{{asset('frontend/images/member-icon/member-4.png')}}" class="member-image mr-1">
              <img src="{{asset('frontend/images/member-icon/member-more.png')}}" class="member-image mr-1">
            </div>
            <hr>
            <h2>Trip Information</h2>
            <table class="trip-information">
              <tr>
                <th width="50%">Date of Trip</th>
                <td width="50%" class="text-right">
                  {{\Carbon\Carbon::create($item->departure_date)->format('F n, Y')}}
                </td>
              </tr>
              <tr>
                <th width="50%">Duration</th>
                <td width="50%" class="text-right">
                  {{$item->duration}}
                </td>
              </tr>
              <tr>
                <th width="50%">Type</th>
                <td width="50%" class="text-right">
                  {{$item->type}}
                </td>
              </tr>
              <tr>
                <th width="50%">Price</th>
                <td width="50%" class="text-right">
                  $ {{$item->price}} / Person
                </td>
              </tr>
            </table>
          </div>
          <div class="join-container">
            @auth
            <form action="{{route('checkout_process',$item->id)}}" method="POST">
              @csrf
              <button class="btn btn-block btn-join-now mt-3 py-2" Type="submit">
                Join Now
              </button>
            </form>
            @endauth

            @guest
            <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-3 py-2">
              Login or Register to Join
            </a>
            @endguest
          </div>
        </div>
      </div>
  </section>
</main>


@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{asset('frontend/libraries/xzoom/dist/xzoom.css')}}">
@endpush

@push('addon-script')
<script src="{{asset('frontend/libraries/xzoom/dist/xzoom.min.js')}}"></script>
<script>
  $(document).ready(function () {
    $('.xzoom, .xzoom-gallery').xzoom({
      zoomWidth: 500,
      title: false,
      tint: '#333',
      Xoffset: 15
    });
  });
</script>
@endpush