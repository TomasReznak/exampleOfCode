@extends('layouts.main')

@section('content')
  <div class="banner-wrap text-center p-lg">
    <h1 class="pt-lg">Welcome to main page</h1>
    <div class="pt-xs pb-lg">
      <a href="https://adfinis-sygroup.github.io/prometheus-architecture/">Software Architecture</a> |
      <a href="{{ route('products.index') }}">Product Listing</a>
    </div>

  </div>
  <div class="home-top-category-wrapper wrapper">
    <div class="row">
      <div class="col-12">
        <h1>Top Categories</h1>
      </div>
    </div>
    <div class="row">
      @foreach($topCategories as $topCategory)
        <div class="col-md-3 col-6">
          <div class="home-top-category-item">
            <a href="{{ route('categories.show', ['id' => $topCategory->id]) }}">
              <img src="https://placeimg.com/130/130/animals?{{$topCategory->id}}">
              <h2 class="mt-xs text-center">{{$topCategory->name}}</h2>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
