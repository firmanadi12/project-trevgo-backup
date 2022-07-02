@extends('layouts.checkout')

@section('title')
    Checkout
@endsection

@section('content')

<main>  
        <section class="section section-details-header">
          
        </section>

        <section class="section section-details-content">
          <div class="container">
            <div class="row">
              <div class="col p-0">
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      Paket Wisata
                    </li>
                    <li class="breadcrumb-item">
                      Details
                    </li>
                    <li class="breadcrumb-item active">
                      Checkout
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 pl-lg-0">
                <div class="card card-details">
                  <h1>Trip Member</h1>
                  <p>
                    Trip to Nusa Penida, Bali, Indonesia
                  </p>
                  <div class="anttendee">
                    <table class="table table-responsive-sm text-center">
                      <thead>
                        <tr>
                          <td>Photo</td>
                          <td>Name</td>
                          <td>Nationality</td>
                          <td>Visa</td>
                          <td>Passport</td>
                          <td></td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <img src="{{asset('frontend/images/member-icon/member-2@2x.png')}}" height="60">
                          </td>
                          <td class="align-middle">
                            David James
                          </td>
                          <td class="align-middle">
                            US
                          </td>
                          <td class="align-middle">
                            30 Days
                          </td>
                          <td class="align-middle">
                            Active
                          </td>
                          <td class="align-middle">
                            <a href="#">
                              <img src="{{asset('frontend/images/ic_remove.png')}}" alt="">
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <img src="{{asset('frontend/images/member-icon/member-3@2x.png')}}" height="60">
                          </td>
                          <td class="align-middle">
                            Jack Wiliams
                          </td>
                          <td class="align-middle">
                            NL
                          </td>
                          <td class="align-middle">
                            30 Days
                          </td>
                          <td class="align-middle">
                            Active
                          </td>
                          <td class="align-middle">
                            <a href="#">
                              <img src="{{asset('frontend/images/ic_remove.png')}}" alt="">
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="member mt-3">
                    <h2>Add Member</h2>
                    <form  class="form-inline">
                      <label for="inputUsername" class="sr-only">Name</label>
                      <input type="text" name="inputUsername" id="inputUsername" class="form-control mb-2 mr-sm-2" placeholder="Username">
                      <label for="inputVisa" class="sr-only">Visa</label>
                        <select name="inputVisa" id="inputVisa" class="custom-select mb-2 mr-sm-2">
                          <option value="VISA" selected >VISA</option>
                          <option value="30 Days">30 Days</option>
                          <option value="45 Days">45 Days</option>
                          <option value="60 Days">60 Days</option>
                          <option value="N/A">N/A</option>
                        </select>
                     <label class="sr-only" for="doePassport">DOE Passport</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control datepicker" id="doePassport" placeholder="DOE Passport"/>
                      </div>

                      <button type="submit" class="btn btn-add-now mb-2 px-4">
                        Add Now
                      </button>
                    </form>
                    <h3 class="mt-2 mb-0">Note</h3>
                    <p class="disclaimer mb-0">
                      You are only able to invite member that has registered in
                      Nomads.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-details card-right">
                  <h2>Checkout Information</h2>
                  <table class="trip-information">
                    <tr>
                      <th width="50%">Members</th>
                      <td width="50%" class="text-right">
                        2 Person
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Additional VISA</th>
                      <td width="50%" class="text-right">
                        $ 0
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Trip Price</th>
                      <td width="50%" class="text-right">
                        $ 80,00 / Person
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Sub Total</th>
                      <td width="50%" class="text-right">
                        $ 160,00
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Total (+Unique)</th>
                      <td width="50%" class="text-right text-total">
                        <span class="text-blue">$ 160,</span
                        ><span class="text-orange">33</span>
                      </td>
                    </tr>
                  </table>
                  <hr />
                  <h2>Payment Instructions</h2>
                  <p class="payment-instruntion">
                    Please complete your payment before to continue
                  </p>
                  <div class="bank">
                    <div class="bank-item pb-3">
                      <img src="{{asset('frontend/images/ic_bank.png')}}" alt="" class="bank-image"> 
                      <div class="description">
                        <h3>PT. Traveling Indonesia</h3>
                        <p>
                          0812-812-812-812<br />
                          Bank Central Asia (BCA)
                        </p>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="bank-item pb-3">
                      <img src="{{asset('frontend/images/ic_bank.png')}}" alt="" class="bank-image"> 
                      <div class="description">
                        <h3>PT. Traveling Indonesia</h3>
                        <p>
                          0888-112-112-112<br />
                          Bank Mandiri (Mandiri)
                        </p>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>  
               <div class="join-container">
                  <a href="booking.html" class="btn btn-block btn-join-now mt-3 py-2">
                    I Have Made Payment
                  </a>
               </div> 
               <div class="text-center mt-3">
                <a href="#" class="text-muted">Cancel Booking</a>
              </div>
            </div>
          </div>
        </section>
      </main>

@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{asset('frontend/libraries/gijgo/css/gijgo.min.css')}}">
@endpush

@push('addon-script')
<script src="{{asset('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
<script>
      $(document).ready(function(){
        $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          uiLibrary: 'bootstrap4',
          icons: {
            rightIcon: '<img src="http://ujicoba.test/frontend/images/ic_doe.png" alt="" />'
          }
        });
      });
    </script>
@endpush