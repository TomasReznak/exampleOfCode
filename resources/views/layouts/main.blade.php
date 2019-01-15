<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

  {{-- This CSRF Token is required for validating Ajax requests --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Stylesheets --}}
  <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">

  {{-- Title of the page --}}
  <title>MrLens website</title>
</head>

<body>
{{-- Importing of the SVGs. They are hidden inside this div --}}
<div style="max-height: 0; max-width: 0; overflow: hidden;">
  <?php include_once(public_path('images/svg/sprite-mrlens.svg')); ?>
</div>

<div class="container">
  <header id="header" class="site-header">
    @include('layouts.partials.header_desktop')
    @include('layouts.partials.header_mobile')
  </header>

  <div class="content-wrapper">
    <main id="app">
      {{-- Here comes the content of the page --}}
      @yield('content')
    </main>
  </div>
</div>

<script>
  var CART_ITEMS = @json($cart);
</script>
@yield('js_data')

<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>

{{-- Here comes js of the page --}}
@yield('js')


</body>
</html>
