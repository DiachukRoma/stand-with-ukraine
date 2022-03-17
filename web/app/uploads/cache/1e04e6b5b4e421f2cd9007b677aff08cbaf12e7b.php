<footer class="footer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<h3 class="title"><?php echo pll__('Ukraine is now fighting for its survival. Let\'s defend <span>Ukraine</span> together!'); ?></h3>

				<div class="footer__btns">
					<a href="#"><?php echo e(pll__('Have a questions?')); ?></a>
				</div>

				<?php if(has_nav_menu('primary_navigation')): ?>
					<?php echo wp_nav_menu($nav_arguments_footer->primary); ?>

				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>
