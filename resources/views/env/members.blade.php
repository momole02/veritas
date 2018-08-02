@extends('layout')

@section('pageTitle')
VERITAS- Espace membres
@endsection

@section('content')
<section class="top-post-area pt-10">
	<div class="container no-padding">
		<div class="row" >
			<div class="col-lg-12">
				<div class="hero-nav-area" style="background:#212529;">
					<h1 class="text-white">Espace membres</h1>
					{{-- 
					<p class="text-white link-nav">
						<a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>
						<a href="contact.html">Contact Us </a>
					</p> --}}
				</div>
			</div>
		</div>
	</div>
</section>

<section class="pt-50 pb-120">
	
		<div class="container"  style="background: white">
			<div class="row">
				<h4 style="background: #212529;color:white;width:100%;text-align:center;" >Informations compte</h4>
			</div>

			@php
				$user = \App\AuthBusiness::getUserInfo('user-info');
			@endphp 

			<div class="row">
				<div class="col-lg-5" style="padding-bottom: 50px;">
					Photo : 
					<div style="height: 200px;">
					@if( $user->photo_mb == null)
						<b>Non affectée</b>
					@else
						<img style="width: 300px" class="img img-responsive" src="{{asset(Storage::url($user->photo_mb))}}">
					@endif
					</div>
					<br>
					<br>

					<form method="post" action="{{route('envDoUpdateUserPhoto')}}" enctype="multipart/form-data">
						@csrf
						Ajouter une photo:<br>
						<input type="file" name="user-photo">
						<button type="submit" class="btn btn-primary ">Envoyer</button>
					</form> 
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					
						<u>Nom :</u> {{$user->nom_mb}}<br><br>
						<u>Prénom :</u> {{$user->prenom_mb}}<br><br>
						<u>Date de naissance:</u> {{$user->date_nais_mb}}<br><br>
						<u>Email:</u> {{$user->email_mb}}<br><br>
				</div>	
				<div class="col-lg-6">
					<u>Téléphone: </u>{{$user->numero_mb}}<br><br>
					<u>Pseudo: </u>{{$user->login_mb}}<br><br>
				</div>	
			</div>
			
			<div class="row">

				<div class="col-lg-6" style="height: 300px" >
					<h4 style="background: #212529;color:white;width:100%;text-align:center;" >Dernières publications</h4>
				</div>

				<div class="col-lg-6" style="height: 300px">
					<h4 style="background: #212529;color:white;width:100%;text-align:center;" >Dernières interventions</h4>
				</div>


			</div>
			<hr>

		</div>
		
</section>

@endsection 