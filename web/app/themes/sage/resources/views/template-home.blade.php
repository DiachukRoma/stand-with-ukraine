{{-- 
	Template Name: Page - Home 
--}}

@extends('layouts.app')

@section('content')
		<section class="home_main">
				<div class="container">
						<div class="d-flex flex-wrap flex-lg-nowrap">
								<div class="half">
										<h1 class="mt-1 mt-lg-5 pt-2 pt-lg-5">{!! $main_fields->title !!}</h1>
										<p>{!! $main_fields->description !!}</p>
								</div>
								<div class="half mt-5">
										<video controls>
												<source src="{{ $main_fields->video }}" type="video/mp4">
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
																<img src="@asset('images/arrow-right.svg')" alt="next">
														</button>
														<button type="button" class="hotNews-prev">
																<img src="@asset('images/arrow-left.svg')" alt="left">
														</button>
												</div>
												<div class="swiper-wrapper">
													@foreach ($hotnews_fields->hot_news as $item)
															<div class="swiper-slide">
																	<div class="d-flex">
																			<img src="{{ $item['photo'] }}" class="hotNews__photo" alt="">
																			<div class="hotNews__description py-4 pl-4 pr-5 mr-5 ml-3 mt-2 w-100">
																					<h3>{{ $item['title'] }}</h3>
																					<p>{{ $item['description'] }}</p>
																			</div>
																	</div>
															</div>
														@endforeach
												</div>
										</div>
								</div>
								<div class="col-md-6 slug text-white p-5">{!! $hotnews_fields->description !!}</div>
						</div>
				</div>
		</section>

		<section class="standing">
				<div class="container mt-5 py-5">
						<div class="row section_title">
								<div class="col-md-6">
										<h2>{!! $standing_fields->title !!}</h2>
								</div>
								<div class="col-md-6">
										<p class="section_title__sub p-4 mx-3">{!! $standing_fields->description !!}</p>
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
																<img src="@asset('images/arrow-right.svg')" alt="next">
														</button>
														<button type="button" class="news-prev">
																<img src="@asset('images/arrow-left.svg')" alt="left">
														</button>
												</div>

												<div class="swiper-wrapper">
														<div class="swiper-slide news__single">
																<div class="photo" data-toggle="modal" data-target="#video_1"><img src="@asset('images/news.jpg')" alt="title"></div>
																<div class="data d-flex justify-content-between">
																		<p class="location">Austria, Vienna</p>
																		<p class="protestors">10,000 protestors</p>
																</div>
																<div class="description">Protesters around the world rally in support of Ukraine</div>
														</div>
														<div class="swiper-slide news__single">
																<div class="photo"><img src="@asset('images/tank.jpg')" alt="title"></div>
																<div class="data d-flex justify-content-between">
																		<p class="location">Austria, Vienna</p>
																		<p class="protestors">10,000 protestors</p>
																</div>
																<div class="description">A demonstrator holds a European Union flag during a protest against Russia's military invasion of Ukraine, in front of the Russian Consulate in Barcelona.</div>
														</div>
														<div class="swiper-slide news__single">
																<div class="photo"><img src="@asset('images/news.jpg')" alt="title"></div>
																<div class="data d-flex justify-content-between">
																		<p class="location">Austria, Vienna</p>
																		<p class="protestors">10,000 protestors</p>
																</div>
																<div class="description">People waved yellow-blue Ukrainian flags and chanted pro-Ukraine slogans at the rallies on Thursday.</div>
														</div>
														<div class="swiper-slide news__single">
																<div class="photo"><img src="@asset('images/news.jpg')" alt="title"></div>
																<div class="data d-flex justify-content-between">
																		<p class="location">Austria, Vienna</p>
																		<p class="protestors">10,000 protestors</p>
																</div>
																<div class="description">Protesters around the world rally in support of Ukraine</div>
														</div>
														<div class="swiper-slide news__single">
																<div class="photo"><img src="@asset('images/news.jpg')" alt="title"></div>
																<div class="data d-flex justify-content-between">
																		<p class="location">Austria, Vienna</p>
																		<p class="protestors">10,000 protestors</p>
																</div>
																<div class="description">Protesters around the world rally in support of Ukraine</div>
														</div>
														<div class="swiper-slide news__single">
																<div class="photo"><img src="@asset('images/news.jpg')" alt="title"></div>
																<div class="data d-flex justify-content-between">
																		<p class="location">Austria, Vienna</p>
																		<p class="protestors">10,000 protestors</p>
																</div>
																<div class="description">Protesters around the world rally in support of Ukraine</div>
														</div>
												</div>

												<div class="news-pagination"></div>
										</div>
								</div>
						</div>
				</div>
        <div class="modal fade" id="video_1" tabindex="-1" aria-labelledby="video_1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-body">
                <video class="w-100" controls>
                  <source src="@asset('images/main.mp4')" type="video/mp4">
                </video>
              </div>
            </div>
          </div>
        </div>
		</section>

		<section class="whatHas my-5 py-5">
				<div class="container">
						<div class="row">
								<div class="col-12 text-center section_title">
										<h2 class="whatHas__title">{!! $whathas_fields->title !!}</h2>
										<p class="whatHas__subtitle">{!! $whathas_fields->subtitle !!}</p>
								</div>
						</div>
						<div class="row mt-2">
								<div class="col-md-3">
										<div class="whatHas__single">
												<div class="photo">
														<img src="{{ $whathas_fields->sport['photo'] }}" alt="{{ pll__('Sport') }}">
												</div>
												<h3>{{ pll__('Sport') }}</h3>
												<ul>
														@foreach ($whathas_fields->sport['list'] as $item)
															<li><span>{!! $item['single_item'] !!}</span></li>
														@endforeach
												</ul>
										</div>
								</div>
								<div class="col-md-3">
										<div class="whatHas__single">
												<div class="photo">
														<img src="{{ $whathas_fields->culture['photo'] }}" alt="{{ pll__('Culture') }}">
												</div>
												<h3>{{ pll__('Culture') }}</h3>
												<ul>
													@foreach ($whathas_fields->culture['list'] as $item)
														<li><span>{!! $item['single_item'] !!}</span></li>
													@endforeach
												</ul>
										</div>
										<div class="whatHas__single">
												<div class="photo">
														<img src="{{ $whathas_fields->visas['photo'] }}" alt="{{ pll__('Visas') }}">
												</div>
												<h3>{{ pll__('Visas') }}</h3>
												<ul>
													@foreach ($whathas_fields->visas['list'] as $item)
														<li><span>{!! $item['single_item'] !!}</span></li>
													@endforeach
												</ul>
										</div>
								</div>
								<div class="col-md-3">
										<div class="whatHas__single">
												<div class="photo">
														<img src="{{ $whathas_fields->aviation['photo'] }}" alt="{{ pll__('Aviation') }}">
												</div>
												<h3>{{ pll__('Aviation') }}</h3>
												<ul>
													@foreach ($whathas_fields->aviation['list'] as $item)
														<li><span>{!! $item['single_item'] !!}</span></li>
													@endforeach
												</ul>
										</div>
										<div class="whatHas__single">
												<div class="photo">
														<img src="{{ $whathas_fields->cars['photo'] }}" alt="{{ pll__('Cars') }}">
												</div>
												<h3>{{ pll__('Cars') }}</h3>
												<ul>
													@foreach ($whathas_fields->cars['list'] as $item)
														<li><span>{!! $item['single_item'] !!}</span></li>
													@endforeach
												</ul>
										</div>
								</div>
								<div class="col-md-3">
										<div class="whatHas__single">
												<div class="photo">
														<img src="{{ $whathas_fields->finance['photo'] }}" alt="{{ pll__('Finance') }}">
												</div>
												<h3>{{ pll__('Finance') }}</h3>
												<ul>
													@foreach ($whathas_fields->finance['list'] as $item)
														<li><span>{!! $item['single_item'] !!}</span></li>
													@endforeach
												</ul>
										</div>
										<div class="whatHas__single whatHas__single-black">
												<img src="{{ $whathas_fields->last_block['photo'] }}" alt="{{ pll__('Putin') }}">
												{!! $whathas_fields->last_block['description'] !!}
										</div>
								</div>
						</div>
				</div>
		</section>

		<section class="movement">
				<div class="container">
						<div class="row">
								<div class="col-12 text-center section_title">
										<h2 class="movement__title">{{ $movement_fields->title }}</h2>
										<p class="movement__subtitle">{!! $movement_fields->subtitle !!}</p>
								</div>
						</div>
						<div class="row">
								<div class="col-12">
										<div class="swiper movement__slider">
												<div class="movement__navs d-flex flex-row-reverse">
														<button type="button" class="movement-next">
																<img src="@asset('images/arrow-right.svg')" alt="next">
														</button>
														<button type="button" class="movement-prev">
																<img src="@asset('images/arrow-left.svg')" alt="left">
														</button>
												</div>

												<div class="swiper-wrapper">
														@foreach ($movement_fields->single_slide as $item)
															<div class="swiper-slide movement__single">
																	<p class="description">{{ $item['description'] }}</p>
																	<div class="d-flex">
																			<div class="avatar">
																					<img src="{{ $item['photo'] }}" alt="{{ $item['name'] }}">
																			</div>
																			<div class="data">
																					<h4>{{ $item['name'] }}</h4>
																					<p>{{ $item['position'] }}</p>
																			</div>
																	</div>
															</div>
														@endforeach
												</div>
												<div class="movement-pagination"></div>
										</div>
								</div>
						</div>
				</div>
		</section>
@endsection
