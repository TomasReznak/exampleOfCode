<div class="desktop-header">

  <div class="header-top">
    <div class="wrapper">
      <div class="tel_number">
        <icon href="swiss-flag"></icon>
        +41 41 741 28 87
      </div>

      <ul>
        <li><a href="#">Customer protection</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="#">Language <icon href="arrow_down"></icon> </a></li>
      </ul>
    </div>
  </div>

  <div class="header-middle">
    <div class="wrapper">
      <a href="{{ url('/') }}" class="logo"> <icon href="mrlens"></icon> </a>

      <ul>
        <li class="refill-button">
          <a href="#">
            <icon href="reorder"></icon>
            <span class="refill header-icon-desc">Refill<br> Express</span>
          </a>
        </li>

        <li class="shopping-cart-wrapper">
          <a class="shopping-cart-button" href="{{ route('cart.index') }}">
            <icon href="cart"></icon>
            {{--<span class="header-icon-desc"><span class="weight-normal">CHF</span> <strong>0.00</strong></span>--}}
            <span class="number-of-products" v-text="$store.getters.totalItemsInCart"></span>
          </a>

          <cart-popup button-href="{{ route('cart.index') }}"></cart-popup>
        </li>

        <li>
          <a href="#">
            <icon href="avatar"></icon>
            <span class="header-icon-desc">Login / Sign up</span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <nav class="header-bottom">
    <navigation :data="{{ json_encode($navigation) }}"></navigation>
  </nav>
</div>