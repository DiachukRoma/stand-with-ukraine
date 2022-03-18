<header class="py-3">
  <div class="header__container">
    <a href="{{ home_url('/') }}" class="col-3 d-flex align-items-center"><img src="@asset('images/logo.svg')" alt="logo"></a>

    <button type="button" class="mob_menu_btn">
      <span class="line"></span>
      <span class="line"></span>
      <span class="line"></span>
    </button>
    
    @if (has_nav_menu("primary_navigation"))
      {!! wp_nav_menu( $nav_arguments->primary ) !!}
    @endif

    <div class="col-3 text-end justify-content-lg-end">
      <a href="https://bank.gov.ua/en/news/all/natsionalniy-bank-vidkriv-spetsrahunok-dlya-zboru-koshtiv-na-potrebi-armiyi" class="btn me-2" target="_blank">{{ pll__('Donation to Ukrainian army') }}</a>

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