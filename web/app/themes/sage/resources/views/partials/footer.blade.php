<footer class="footer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<h3 class="title">{!! pll__('Ukraine is now fighting for its survival. Let\'s defend <span>Ukraine</span> together!') !!}</h3>

				<div class="footer__btns">
					<a href="#">{{ pll__('Have a questions?') }}</a>
				</div>

				@if (has_nav_menu('primary_navigation'))
					{!! wp_nav_menu($nav_arguments_footer->primary) !!}
				@endif
			</div>
		</div>
	</div>
</footer>

<span id="toTop"><img src="@asset('images/toTop.jpg')" alt="to top"></span>
