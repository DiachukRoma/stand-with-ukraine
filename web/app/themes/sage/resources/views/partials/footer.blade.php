<footer class="footer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<h3 class="title">{!! pll__('Ukraine is now fighting for its survival. Let\'s defend <span>Ukraine</span> together!') !!}</h3>

				<div class="footer__btns">
					<button type="button" data-toggle="modal" data-target="#haveQuestion">{{ pll__('Have a questions?') }}</button>
				</div>

				@if (has_nav_menu('primary_navigation'))
					{!! wp_nav_menu($nav_arguments_footer->primary) !!}
				@endif
			</div>
		</div>
	</div>
</footer>

<div class="modal fade" id="haveQuestion" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">Close</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="section_title">
					<h2 >have a <span>Question?</span></h2>
				</div>

				<form>
					<div class="form-group">
						<label for="subject">Subject</label>
						<input type="text" id="subject" class="form-control" name="subject" placeholder="Your subject">
					</div>
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" id="email" class="form-control" name="email" placeholder="Your email">
					</div>
					<div class="form-group">
						<label for="details">Provide details *</label>
						<textarea class="form-control" id="details" name="details" rows="7" required></textarea>
					</div>
					<div class="d-flex justify-content-between">
						<span class="formStatus"></span>
						<button type="submit" class="btn">Submit</button>
					</div>
				</form>
      </div>
    </div>
  </div>
</div>

<span id="toTop"><img src="@asset('images/toTop.jpg')" alt="to top"></span>
