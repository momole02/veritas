@extends('layout')

@section('pageTitle')
	VERITAS - Posts
@endsection

@section('content')
<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start latest-post Area -->
							<div class="latest-post-wrap">
								<h4 class="cat-title">Liste des news</h4>

								@isset( $posts )
								@foreach( $posts as $postEntry )
								<div class="single-latest-post row align-items-center">
									<div class="col-lg-5 post-left">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											<img class="img-fluid" src="{{asset(Storage::url($postEntry->img_sujet))}}" alt="">
										</div>
										{{-- <ul class="tags">
											<li><a href="#">Lifestyle</a></li>
										</ul> --}}
									</div>

									<div class="col-lg-7 post-right">
										<a href="image-post.html">
											<h4>{{$postEntry->titre_sujet}}</h4>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$postEntry->date_par_sujet}}</a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
										</ul>
										<p class="excert">
											@php 
												$content = substr( $postEntry->contenu_sujet, 0 , 140 );
												if( strlen( $postEntry->contenu_sujet )>140 )
													$content .= '...';
											@endphp

											{{$content}}
										</p>
									</div>
								</div>

								@endforeach
								@endisset
							</div>
							<!-- End latest-post Area -->
							
							<!-- Start banner-ads Area -->
							<div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
								<img class="img-fluid" src="{{asset('img/banner-ad.jpg')}}" alt="">
							</div>
							<!-- End banner-ads Area -->
							<div class="col-lg-12 post-list">
							<div class="latest-post-wrap">
								<h4 class="cat-title">Ajouter news</h4>
								@if( \App\AuthBusiness::isUserConnected() )
								<form method="post" enctype="multipart/form-data" action="{{route('postsDoPost')}}">
									@csrf
									<br><br>
									<div class="form-group" >
										<label>Titre : </label>
										<input type="text" class="form-control" name="post-title" id="post-title" >
									</div>
									<div class="form-group">
										<label>Image d'illustration : </label>
										<input type="file" class="form-control" name="post-img">
									</div>
									<div class="form-group">
										<label>Texte:</label>
										<textarea class="form-control" name="post-content" rows="15"></textarea>
									</div>
									<button class="btn btn-success" type="submit">Poster !</button>
								</form>
								@else
								<p><i>Vous devez etre connecté pour poster.</i></p>
								@endif 

							</div> 
							</div>
						</div>
						<div class="col-lg-4">
							<div class="sidebars-area">
								<div class="single-sidebar-widget editors-pick-widget">
									<h6 class="title">A la une</h6>
									<div class="editors-pick-post">
										<div class="feature-img-wrap relative">
											<div class="feature-img relative">
												<div class="overlay overlay-bg"></div>
												<img class="img-fluid" src="img/e1.jpg" alt="">
											</div>
											<ul class="tags">
												<li><a href="#">Travel</a></li>
											</ul>
										</div>
										<div class="details">
											<a href="image-post.html">
												<h4 class="mt-20">A Discount Toner Cartridge Is
												Better Than Ever.</h4>
											</a>
											<ul class="meta">
												<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
												<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
												<li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
											</ul>
											<p class="excert">
												Lorem ipsum dolor sit amet, consecteturadip isicing elit, sed do eiusmod tempor incididunt ed do eius.
											</p>
										</div>
										<div class="post-lists">
											<div class="single-post d-flex flex-row">
												<div class="thumb">
													<img src="img/e2.jpg" alt="">
												</div>
												<div class="detail">
													<a href="image-post.html"><h6>Help Finding Information
													Online is so easy</h6></a>
													<ul class="meta">
														<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
														<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
													</ul>
												</div>
											</div>
											<div class="single-post d-flex flex-row">
												<div class="thumb">
													<img src="img/e3.jpg" alt="">
												</div>
												<div class="detail">
													<a href="image-post.html"><h6>Compatible Inkjet Cartr
													world famous</h6></a>
													<ul class="meta">
														<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
														<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
													</ul>
												</div>
											</div>
											<div class="single-post d-flex flex-row">
												<div class="thumb">
													<img src="img/e4.jpg" alt="">
												</div>
												<div class="detail">
													<a href="image-post.html"><h6>5 Tips For Offshore Soft
													Development </h6></a>
													<ul class="meta">
														<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
														<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="single-sidebar-widget ads-widget">
									<img class="img-fluid" src="{{asset('img/sidebar-ads.jpg')}}" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
@endsection