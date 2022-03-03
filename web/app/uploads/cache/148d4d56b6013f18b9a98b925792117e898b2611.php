<header class="py-3">
  <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start">
    <a href="<?php echo e(home_url('/')); ?>" class="d-flex align-items-center mb-2 mb-lg-0"><img src="<?= App\asset_path('images/logo.png'); ?>" alt="logo"></a>

    <button type="button" class="mob_menu_btn">
      <span class="line"></span>
      <span class="line"></span>
      <span class="line"></span>
    </button>
    
    <?php if(has_nav_menu("primary_navigation")): ?>
      <?php echo wp_nav_menu( $nav_arguments->primary ); ?>

    <?php endif; ?>

    <div class="text-end">
      <a href="#" class="btn me-2"><?php echo e(pll__('Donation to Ukrainian army')); ?></a>

      <div class="lang_switcher">
        <span>EN</span>
        <ul class="hidden_switcher">
          <?php
            pll_the_languages(array('display_names_as' => 'slug' ))
          ?> 
        </ul>
      </div>
    </div>
  </div>
</header>