<div class="mobile-header">
  <div class="wrapper">
    <ul>
      <li>
        <a @click="openMobileNav">
          <icon href="burger"></icon>
        </a>
      </li>
      <li>
        <a>
          <icon href="search"></icon>
        </a>
      </li>
      <li>
        <a class="mobile-logo" href="{{ url('/') }}"><icon href="mrlens"></icon></a>
      </li>
      <li>
        <a href="{{ route('cart.index') }}">
          <icon href="cart-mobile"></icon>
        </a>
      </li>
      <li>
        <a href="">
          <icon href="avatar-mobile"></icon>
        </a>
      </li>
    </ul>
  </div>
</div>

<mobile-navigation :data="{{ json_encode($navigation) }}" ref="mobile-navigation" ></mobile-navigation>