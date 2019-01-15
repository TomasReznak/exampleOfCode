@extends('layouts.main')

@section('content')
  <div class="wrapper box pt-lg">
    <product-list :data="products"></product-list>
  </div>

	<infinite-scroll-trigger @load="addPage($event)" :page="{{ empty(app('request')->input('page')) ? 1 : app('request')->input('page') }}" :offset="-150">
      <p slot="loading">Loading in Progress</p>
      <p slot="end">You viewed all of the products</p>
	</infinite-scroll-trigger>
@endsection

@section('js')
  <script>var products = @json($products)</script>
  <script src="{{ mix('js/product.index.js') }}"></script>
@endsection

