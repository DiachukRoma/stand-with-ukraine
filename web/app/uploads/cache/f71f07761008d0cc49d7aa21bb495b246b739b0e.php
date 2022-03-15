<?php $__env->startSection('content'); ?>
	<section class="home_main">
		<div class="container">
			<div class="d-flex flex-wrap flex-lg-nowrap">
				<div class="half">
					<h1 class="mt-5 pt-2 pt-lg-5"><?php echo $main_fields->title; ?></h1>
					<p><?php echo $main_fields->description; ?></p>
				</div>
				<div class="half mt-5">
					<video controls>
						<source src="<?php echo e($main_fields->video); ?>" type="video/mp4">
					</video>
				</div>
			</div>
		</div>
		<div class="container container-max mt-xl-5 pt-0 pt-xl-5 px-4">
			<div class="row px-2">
				<div class="col-xl-6 bg-light pl-0">
					<div class="swiper hotNews">
						<div class="hotNews__navs d-flex flex-row-reverse">
							<button type="button" class="hotNews-next"></button>
							<button type="button" class="hotNews-prev"></button>
						</div>
						<div class="swiper-wrapper">
							<?php $__currentLoopData = $hotnews_fields->hot_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="swiper-slide">
									<div class="d-md-flex">
										<img src="<?php echo e($item['photo']); ?>" class="hotNews__photo" alt="">
										<div class="hotNews__description py-4 pl-4 pr-5 mr-5 ml-3 mt-2 w-100">
											<h3><?php echo e($item['title']); ?></h3>
											<p><?php echo e($item['description']); ?></p>
										</div>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
				<div class="col-xl-6 slug p-5"><?php echo $hotnews_fields->description; ?></div>
			</div>
		</div>
	</section>

	<section class="news">
		<div class="container mt-5 py-5">
			<div class="row section_title py-0 my-0 py-md-2 my-md-2 ">
				<div class="col-md-12 text-center">
					<h2><?php echo $standing_fields->title; ?></h2>
				</div>
			</div>
		</div>
		<div class="container mb-lg-5 pb-lg-5">
			<div class="row">
				<div class="news__filters">
					<button type="button" class="btn swiper-filter swiper-active" data-filter=""><?php echo e(pll__('All')); ?></button>
					<?php $__currentLoopData = $news_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<button type="button" class="btn swiper-filter" data-filter=".<?php echo e($item->slug); ?>"><?php echo e($item->name); ?></button>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="col-12">
					<div class="swiper news__slider">
						<div class="news__navs d-flex flex-row-reverse">
							<button type="button" class="news-next">
								<img src="<?= App\asset_path('images/arrow-right.svg'); ?>" alt="next">
							</button>
							<button type="button" class="news-prev">
								<img src="<?= App\asset_path('images/arrow-left.svg'); ?>" alt="left">
							</button>
						</div>

						<div class="swiper-wrapper">
							<?php $__currentLoopData = $news_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="swiper-slide news__single <?php echo e($item->categories); ?>">
									<?php if(isset($item->video)): ?>
										<?php echo $item->video; ?>

									<?php endif; ?>

									<div class="title p-2"><?php echo e($item->title); ?></div>

									<?php if(isset($item->excerpt)): ?>
										<div class="description px-2"><?php echo e($item->excerpt); ?></div>
									<?php endif; ?>

									<div class="data d-flex align-items-center justify-content-between px-2 mt-5">
										<p class="date m-0"><?php echo e($item->date); ?></p>
										<a href="<?php echo e($item->twitter_link); ?>" target="_blank" class="d-flex"><img src="<?= App\asset_path('images/twitter.svg'); ?>" alt="twitter"></a>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>

						<div class="swiper-scrollbar"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="canHelp mt-5 py-5">
		<div class="container py-lg-5">
			<div class="row">
				<div class="col-lg-6 section_title">
					<h2 class="mb-4"><?php echo $can_halp->title; ?></h2>
					<p><?php echo $can_halp->description; ?></p>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<h3><?php echo $can_halp->subtitle; ?></h3>
					<div class="canHelp__btns">
						<a href="<?php echo e($can_halp->link_1['url']); ?>" class="btn"><?php echo e($can_halp->link_1['title']); ?></a>
						<a href="<?php echo e($can_halp->link_2['url']); ?>" class="btn"><?php echo e($can_halp->link_2['title']); ?></a>
						<a href="<?php echo e($can_halp->link_3['url']); ?>" class="btn"><?php echo e($can_halp->link_3['title']); ?></a>
						<a href="<?php echo e($can_halp->link_4['url']); ?>" class="btn"><?php echo e($can_halp->link_4['title']); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="protests" class="movement">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center section_title">
					<h2 class="movement__title"><?php echo $movement_fields_title->title; ?></h2>
					<p class="movement__description"><?php echo $movement_fields_title->description; ?></p>
					<p class="movement__subtitle"><?php echo $movement_fields_title->subtitle; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="swiper movement__slider">
						<div class="movement__navs d-flex flex-row-reverse">
							<button type="button" class="movement-next">
								<img src="<?= App\asset_path('images/arrow-right.svg'); ?>" alt="next">
							</button>
							<button type="button" class="movement-prev">
								<img src="<?= App\asset_path('images/arrow-left.svg'); ?>" alt="left">
							</button>
						</div>

						<div class="swiper-wrapper">
							<?php $__currentLoopData = $movement_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="swiper-slide movement__single">
									<div class="movement__attachment">
										<?php echo $item->attach; ?>

									</div>
									<div class="movement__localeMembers d-flex justify-content-between align-items-center px-3 py-2">
										<p class="d-flex align-items-center"><img src="<?= App\asset_path('images/placeholder.svg'); ?>" class="mr-2" alt=""> <?php echo e($item->location); ?></p>
										<p><?php echo e($item->members); ?></p>
									</div>
									<p class="single_description px-3"><?php echo e($item->title); ?></p>

									<?php if(isset($item->tags)): ?>
										<p class="movement__tags px-3">
											<?php $__currentLoopData = $item->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<span> #<?php echo e($tag->name); ?></span>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</p>
									<?php endif; ?>

									<div class="movement__dateLink d-flex align-items-center justify-content-between px-3 mt-4 mb-3">
										<p class="date m-0"><?php echo e($item->date); ?></p>
										<a href="<?php echo e($item->twitter_link); ?>" target="_blank" class="d-flex"><img src="<?= App\asset_path('images/twitter.svg'); ?>" alt="twitter"></a>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<div class="swiper-scrollbar"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="sanctions" class="sanctions">
		<div class="container">
			<div class="row mb-5">
				<div class="col-lg-8 offset-lg-2 text-center section_title">
					<h2 class="sanctions__title"><?php echo $sanctions_fields->title; ?></h2>
					<p class="sanctions__description"><?php echo $sanctions_fields->description; ?></p>
				</div>
			</div>
			<div class="row sanctions_filter">
				<div class="news__filters">
					<button type="button" class="btn swiper-filter swiper-active" data-filter=""><?php echo e(pll__('All')); ?></button>
					<?php $__currentLoopData = $sanctions_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<button type="button" class="btn swiper-filter" data-filter=".<?php echo e($item->slug); ?>"><?php echo e($item->name); ?></button>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="col-12">
					<div class="swiper sanctions__slider">
						<div class="sanctions__navs d-flex flex-row-reverse">
							<button type="button" class="sanctions-next">
								<img src="<?= App\asset_path('images/arrow-right.svg'); ?>" alt="next">
							</button>
							<button type="button" class="sanctions-prev">
								<img src="<?= App\asset_path('images/arrow-left.svg'); ?>" alt="left">
							</button>
						</div>

						<div class="swiper-wrapper">
							<?php $__currentLoopData = $sanctions_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="swiper-slide sanctions__single <?php echo e($item->categories); ?>">
									<div>
										<div class="sanctions__attachment">
											<?php echo $item->attach; ?>

										</div>

										<div class="px-2">
											<div class="title p-2 mt-2"><?php echo e($item->title); ?></div>

											<?php if(isset($item->excerpt)): ?>
												<div class="description px-2"><?php echo e($item->excerpt); ?></div>
											<?php endif; ?>
										</div>										
									</div>
									<div class="sanctions__dateLink d-flex align-items-center justify-content-between px-3 mt-4 mb-3">
										<p class="date m-0"><?php echo e($item->date); ?></p>
										<a href="<?php echo e($item->link); ?>" class="d-flex"><img src="<?= App\asset_path($item->link_icon); ?>" alt="icon"></a>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<div class="swiper-scrollbar"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="petitions" class="sanctions petitions">
		<div class="container">
			<div class="row mb-5">
				<div class="col-lg-8 offset-lg-2 text-center section_title">
					<h2 class="sanctions__title"><?php echo $petitions_fields->title; ?></h2>
					<p class="sanctions__description"><?php echo $petitions_fields->description; ?></p>
				</div>
			</div>
			<div class="row petitions_filters">
				<div class="news__filters">
					<button type="button" class="btn swiper-filter swiper-active" data-filter=""><?php echo e(pll__('All')); ?></button>
					<?php $__currentLoopData = $petitions_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<button type="button" class="btn swiper-filter" data-filter=".<?php echo e($item->slug); ?>"><?php echo e($item->name); ?></button>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="col-12">
					<div class="swiper section_slider petitions__slider">
						<div class="sanctions__navs d-flex flex-row-reverse">
							<button type="button" class="petitions-next">
								<img src="<?= App\asset_path('images/arrow-right.svg'); ?>" alt="next">
							</button>
							<button type="button" class="petitions-prev">
								<img src="<?= App\asset_path('images/arrow-left.svg'); ?>" alt="left">
							</button>
						</div>

						<div class="swiper-wrapper">
							<?php $__currentLoopData = $petitions_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="swiper-slide sanctions__single <?php echo e($item->categories); ?>">
									<div>
										<div class="sanctions__attachment">
											<?php echo $item->attach; ?>

										</div>

										<div class="px-2">
											<div class="title p-2 mt-2"><?php echo e($item->title); ?></div>

											<?php if(isset($item->excerpt)): ?>
												<div class="description px-2"><?php echo e($item->excerpt); ?></div>
											<?php endif; ?>
										</div>										
									</div>
									<div class="sanctions__dateLink d-flex align-items-center justify-content-between px-3 mt-4 mb-3">
										<p class="date m-0"><?php echo e($item->date); ?></p>
										<a href="<?php echo e($item->link); ?>" target="_blank" class="d-flex"><img src="<?= App\asset_path('images/web.svg'); ?>" alt="icon"></a>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<div class="swiper-scrollbar"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="donations" class="sanctions donation">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 text-center section_title">
					<h2 class="sanctions__title mb-5"><?php echo $donation_fields->title; ?></h2>
					<p class="sanctions__description"><?php echo $donation_fields->description; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="swiper section_slider donation__slider">
						<div class="sanctions__navs d-flex flex-row-reverse">
							<button type="button" class="donation-next">
								<img src="<?= App\asset_path('images/arrow-right.svg'); ?>" alt="next">
							</button>
							<button type="button" class="donation-prev">
								<img src="<?= App\asset_path('images/arrow-left.svg'); ?>" alt="left">
							</button>
						</div>

						<div class="swiper-wrapper">
							<?php $__currentLoopData = $donation_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="swiper-slide sanctions__single">
									<div>
										<div class="sanctions__attachment">
											<?php echo $item->attach; ?>

										</div>

										<div class="px-2">
											<div class="title p-2 mt-2"><?php echo e($item->title); ?></div>

											<?php if(isset($item->excerpt)): ?>
												<div class="description px-2"><?php echo e($item->excerpt); ?></div>
											<?php endif; ?>
										</div>										
									</div>
									<div class="sanctions__dateLink d-flex align-items-center justify-content-between px-3 mt-4 mb-3">
										<p class="date m-0"><?php echo e($item->date); ?></p>
										<a href="<?php echo e($item->link); ?>" target="_blank" class="d-flex"><img src="<?= App\asset_path('images/web.svg'); ?>" alt="icon"></a>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<div class="swiper-scrollbar"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>