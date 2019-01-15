@extends('layouts.main')

@section('content')
  <div class="cart-wrapper wrapper-alternative">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div id="cart-products-list" class="cart-products-list">
          <h2>Your shopping cart</h2>

          {{-- TODO: Move displaying messages/errors to layout template? --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          {{--list of products in cart--}}
          <cart-list></cart-list>
        </div>

        {{--<div>--}}
        {{--<form method="post" action="/cart">--}}
        {{--@csrf--}}
        {{--<input type="hidden" name="id" value="1" />--}}
        {{--Qty: <input type="text" name="qty" value="1" title="Quantity" />--}}
        {{--<input type="submit" value="Add" />--}}
        {{--</form>--}}
        {{--</div>--}}
      </div>

      {{----sidebar----}}
      <div class="col-md-4">
        <div class="cart-sidebar">
          <h2>Our website is secure!</h2>
          <div>
            @include('utilities.svg', ['name' => 'secure'])
            <strong>Payment Card Industry Data Security</strong>
            <p>We've acquired a PCI DSS certificate that confirms the safety of payments made on our website.</p>
          </div>

          <div class="safe-data">
            @include('utilities.svg', ['name' => 'shield'])
            <strong>Your data is safe with us</strong>
            <p>Our website is protected by SSL which encrypts and therefore protects your data.</p>
          </div>

          <ul>
            <li>
              @include('utilities.svg', ['name' => 'check']) High quality products of all brands
            </li>
            <li>
              @include('utilities.svg', ['name' => 'check']) High quality products of all brands
            </li>
            <li>
              @include('utilities.svg', ['name' => 'check']) High quality products of all brands
            </li>
          </ul>
        </div>
      </div>
      {{----end of sidebar----}}
    </div>
  </div>

@endsection

@section('js')
  <script src="{{ mix('js/cart.index.js') }}"></script>
@endsection