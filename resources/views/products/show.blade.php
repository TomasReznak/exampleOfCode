@extends('layouts.main')

@section('content')
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
  <div class="wrapper box shadow">
    <div class="product-detail">
      <div class="row">
        <div class="col-md-8">

          <div class="product-detail-image">
            <img src="https://placeimg.com/200/200/animals?{{ $product->id }}">
          </div>

          {{--description tables--}}

          <ul>
            <li class="active"> Description</li>
            {{--<li> About Brand </li>--}}
            {{--<li> Video </li>--}}
          </ul>

          @if (!empty($product->description))
            <p>{{$product->description}}</p>
          @endif

          {{--reviews--}}

          {{--<div class="reviews">--}}
          {{--<h3>Reviews</h3>--}}

          {{--<div class="rating">--}}
          {{--<span>@include('utilities.svg', ['name' => 'star'])</span>--}}
          {{--<span>@include('utilities.svg', ['name' => 'star'])</span>--}}
          {{--<span>@include('utilities.svg', ['name' => 'star'])</span>--}}
          {{--<span>@include('utilities.svg', ['name' => 'star'])</span>--}}
          {{--<span>@include('utilities.svg', ['name' => 'star'])</span>--}}
          {{--</div>--}}
          {{--</div>--}}
        </div>

        {{------sidebar------}}

        <div id="detail-product-sidebar" class="col-md-4 detail-product-sidebar">
          @if (!empty($product->name))
            <h1>{{ $product->name }}</h1>
          @endif

          <form method="post" action="/cart">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}"/>

            <div class="product-detail-price">
              {{--<span class="action-price"> CHF  <strong>  00.00</strong> </span> <span class="regular-price"> CHF <strong>93.20</strong> </span>--}}
            </div>

            {{--first column of sitebar --}}

            <div class="row">
              <div class="col-md-6">

                <div class="quantity">
                  <strong>Quantity:</strong>

                  {{--counter field--}}
                  <counter-input v-model="quantity" name="qty"></counter-input>

                </div>

                {{--<div class="diameter">--}}
                {{--<strong>Diameter:</strong>--}}
                {{--<span>18.3</span>--}}
                {{--</div>--}}

                {{--<div class="base-curve">--}}
                {{--<strong>Base Curve:</strong>--}}
                {{--<span>18.3</span>--}}
                {{--</div>--}}

                {{--<div class="power">--}}
                {{--<strong>Power:</strong>--}}
                {{--<div class="select-wrapper">--}}
                {{--<div class="select-input">--}}
                {{--<img src="/images/svg/selector.svg">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="availability">--}}
                {{--<strong>Availability:</strong>--}}
                {{--</div>--}}

              </div>


              {{--second column of sitebar --}}

              {{--<div class="col-md-6" style="opacity:0.5; position:relative;">--}}
              {{--<div--}}
              {{--style="position: absolute; top:0; left:0; right: 0; bottom: 0; background: transparent; z-index: 1;"></div>--}}
              {{--<div class="quantity">--}}
              {{--<strong>Quantity:</strong>--}}

              {{--counter field--}}
              {{--<counter-input></counter-input>--}}
              {{--</div>--}}

              {{--<div class="diameter">--}}
              {{--<strong>Diameter:</strong>--}}
              {{--<span>18.3</span>--}}
              {{--</div>--}}

              {{--<div class="base-curve">--}}
              {{--<strong>Base Curve:</strong>--}}
              {{--<span>18.3</span>--}}
              {{--</div>--}}

              {{--<div class="power">--}}
              {{--<strong>Power:</strong>--}}
              {{--<div class="select-wrapper">--}}
              {{--<div class="select-input">--}}
              {{--<img src="/images/svg/selector.svg">--}}
              {{--</div>--}}
              {{--</div>--}}
              {{--</div>--}}

              {{--<div class="availability">--}}
              {{--<strong>Availability:</strong>--}}
              {{--</div>--}}
              {{--</div>--}}

              <input type="submit" value="Add to cart"/>


            </div>

          </form>


          {{--<div class="security">--}}
          {{--<h3>--}}
          {{--Our website is secure!--}}
          {{--</h3>--}}
          {{--<div>--}}
          {{--<img src="">--}}
          {{--<p>--}}

          {{--</p>--}}
          {{--</div>--}}

          {{--<div>--}}
          {{--<img src="">--}}
          {{--<p>--}}

          {{--</p>--}}
          {{--</div>--}}
          {{--</div>--}}

        </div>
      </div>
    </div>
    {{--<div>--}}
    {{--<form method="post" action="/cart">--}}
    {{--@csrf--}}
    {{--<input type="hidden" name="id" value="{{ $product->id }}" />--}}
    {{--Qty: <input type="text" name="qty" value="1" title="Quantity" />--}}
    {{--<input type="submit" value="Add" />--}}
    {{--</form>--}}
    {{--</div>--}}
  </div>
@endsection

@section('js')
  <script src="{{ mix('js/product.show.js') }}"></script>
@endsection
