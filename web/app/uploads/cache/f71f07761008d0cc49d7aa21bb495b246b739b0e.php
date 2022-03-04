<?php $__env->startSection('content'); ?>
		<section class="home_main">
				<div class="container">
						<div class="d-flex flex-wrap flex-lg-nowrap">
								<div class="half">
										<h1 class="mt-1 mt-lg-5 pt-2 pt-lg-5"><?php echo $main_fields->title; ?></h1>
										<p><?php echo $main_fields->description; ?></p>
								</div>
								<div class="half mt-5">
										<video controls>
												<source src="<?php echo e($main_fields->video); ?>" type="video/mp4">
										</video>
								</div>
						</div>
				</div>
				<div class="container container-max mt-5 pt-0 pt-xl-5 px-4">
						<div class="row px-2">
								<div class="col-md-6 bg-light pl-0">
										<div class="swiper hotNews">
												<div class="hotNews__navs d-flex flex-row-reverse">
														<button type="button" class="hotNews-next">
																<img src="<?= App\asset_path('images/arrow-right.svg'); ?>" alt="next">
														</button>
														<button type="button" class="hotNews-prev">
																<img src="<?= App\asset_path('images/arrow-left.svg'); ?>" alt="left">
														</button>
												</div>
												<div class="swiper-wrapper">
													<?php $__currentLoopData = $hotnews_fields->hot_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<div class="swiper-slide">
																	<div class="d-flex">
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
								<div class="col-md-6 slug text-white p-5"><?php echo $hotnews_fields->description; ?></div>
						</div>
				</div>
		</section>

		<section class="standing">
				<div class="container mt-5 py-5">
						<div class="row section_title">
								<div class="col-md-6">
										<h2><?php echo $standing_fields->title; ?></h2>
								</div>
								<div class="col-md-6">
										<p class="section_title__sub p-4 mx-3"><?php echo $standing_fields->description; ?></p>
								</div>
						</div>
				</div>
		</section>

		<section class="news">
				<div class="container">
						<div class="row">
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
														<?php $counter = 0; ?>
														<?php $__currentLoopData = $news_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<div class="swiper-slide news__single">
																	<div class="photo" data-toggle="modal" data-target="#news_<?php echo e($counter++); ?>"><?php echo $item->photo; ?></div>
																	<div class="data d-flex justify-content-between">
																			<p class="location"><?php echo e($item->location); ?></p>
																			<p class="protestors"><?php echo e($item->count_people); ?></p>
																	</div>
																	<div class="description"><?php echo e($item->title); ?></div>
															</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</div>

												<div class="news-pagination"></div>
										</div>
								</div>
						</div>
				</div>
				<?php $counter = 0; ?>
				<?php $__currentLoopData = $news_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="modal fade" id="news_<?php echo e($counter); ?>" tabindex="-1" aria-labelledby="news_<?php echo e($counter++); ?>" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-xl">
							<div class="modal-content">
								<div class="modal-body">
									<?php echo $item->content; ?>

								</div>
							</div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</section>

		<section class="whatHas my-5 py-5">
				<div class="container">
						<div class="row">
								<div class="col-12 text-center section_title">
										<h2 class="whatHas__title"><?php echo $whathas_fields->title; ?></h2>
										<p class="whatHas__subtitle"><?php echo $whathas_fields->subtitle; ?></p>
								</div>
						</div>
						<div class="row mt-2">
								<div class="col-md-3">
										<div class="whatHas__single">
												<div class="photo">
														<img src="<?php echo e($whathas_fields->sport['photo']); ?>" alt="<?php echo e(pll__('Sport')); ?>">
												</div>
												<h3><?php echo e(pll__('Sport')); ?></h3>
												<ul>
														<?php $__currentLoopData = $whathas_fields->sport['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<li><span><?php echo $item['single_item']; ?></span></li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</ul>
										</div>
								</div>
								<div class="col-md-3">
										<div class="whatHas__single">
												<div class="photo">
														<img src="<?php echo e($whathas_fields->culture['photo']); ?>" alt="<?php echo e(pll__('Culture')); ?>">
												</div>
												<h3><?php echo e(pll__('Culture')); ?></h3>
												<ul>
													<?php $__currentLoopData = $whathas_fields->culture['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li><span><?php echo $item['single_item']; ?></span></li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</ul>
										</div>
										<div class="whatHas__single">
												<div class="photo">
														<img src="<?php echo e($whathas_fields->visas['photo']); ?>" alt="<?php echo e(pll__('Visas')); ?>">
												</div>
												<h3><?php echo e(pll__('Visas')); ?></h3>
												<ul>
													<?php $__currentLoopData = $whathas_fields->visas['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li><span><?php echo $item['single_item']; ?></span></li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</ul>
										</div>
								</div>
								<div class="col-md-3">
										<div class="whatHas__single">
												<div class="photo">
														<img src="<?php echo e($whathas_fields->aviation['photo']); ?>" alt="<?php echo e(pll__('Aviation')); ?>">
												</div>
												<h3><?php echo e(pll__('Aviation')); ?></h3>
												<ul>
													<?php $__currentLoopData = $whathas_fields->aviation['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li><span><?php echo $item['single_item']; ?></span></li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</ul>
										</div>
										<div class="whatHas__single">
												<div class="photo">
														<img src="<?php echo e($whathas_fields->cars['photo']); ?>" alt="<?php echo e(pll__('Cars')); ?>">
												</div>
												<h3><?php echo e(pll__('Cars')); ?></h3>
												<ul>
													<?php $__currentLoopData = $whathas_fields->cars['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li><span><?php echo $item['single_item']; ?></span></li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</ul>
										</div>
								</div>
								<div class="col-md-3">
										<div class="whatHas__single">
												<div class="photo">
														<img src="<?php echo e($whathas_fields->finance['photo']); ?>" alt="<?php echo e(pll__('Finance')); ?>">
												</div>
												<h3><?php echo e(pll__('Finance')); ?></h3>
												<ul>
													<?php $__currentLoopData = $whathas_fields->finance['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li><span><?php echo $item['single_item']; ?></span></li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</ul>
										</div>
										<div class="whatHas__single whatHas__single-black">
												<img src="<?php echo e($whathas_fields->last_block['photo']); ?>" alt="<?php echo e(pll__('Putin')); ?>">
												<?php echo $whathas_fields->last_block['description']; ?>

										</div>
								</div>
						</div>
				</div>
		</section>

		<section class="movement">
				<div class="container">
						<div class="row">
								<div class="col-12 text-center section_title">
										<h2 class="movement__title"><?php echo e($movement_fields->title); ?></h2>
										<p class="movement__subtitle"><?php echo $movement_fields->subtitle; ?></p>
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
														<?php $__currentLoopData = $movement_fields->single_slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<div class="swiper-slide movement__single">
																	<p class="description"><?php echo e($item['description']); ?></p>
																	<div class="d-flex">
																			<div class="avatar">
																					<img src="<?php echo e($item['photo']); ?>" alt="<?php echo e($item['name']); ?>">
																			</div>
																			<div class="data">
																					<h4><?php echo e($item['name']); ?></h4>
																					<p><?php echo e($item['position']); ?></p>
																			</div>
																	</div>
															</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</div>
												<div class="movement-pagination"></div>
										</div>
								</div>
						</div>
				</div>
		</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>