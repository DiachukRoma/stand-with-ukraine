<header class="py-3">
  <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start">
    <a href="{{ home_url('/') }}" class="d-flex align-items-center mb-2 mb-lg-0"><img src="@asset('images/logo.png')" alt="logo"></a>

    <button type="button" class="mob_menu_btn">
      <span class="line"></span>
      <span class="line"></span>
      <span class="line"></span>
    </button>
    
    @if (has_nav_menu("primary_navigation"))
      {!! wp_nav_menu( $nav_arguments->primary ) !!}
    @endif

    <div class="text-end">
      <a href="#" class="btn me-2">{{ pll__('Donation to Ukrainian army') }}</a>

      <div class="lang_switcher">
        <span>EN</span>
        <ul class="hidden_switcher">
          @php
            pll_the_languages(array('display_names_as' => 'slug' ))
          @endphp 
        </ul>
      </div>
    </div>
  </div>
</header>