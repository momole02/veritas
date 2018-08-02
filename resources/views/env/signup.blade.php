@extends('layout')

@section('pageTitle')
VERITAS- Inscription
@endsection

@section('content')
<section class="top-post-area pt-10">
	<div class="container no-padding">
		<div class="row" >
			<div class="col-lg-12">
				<div class="hero-nav-area" style="background:#212529;">
					<h1 class="text-white">Inscription</h1>
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
	
		<div class="container"  style="background: white;width: 100%">
			<form method="post" action="{{route('envDoSignup')}}">
			@csrf
			<div class="row">
				
				<h4 class="cat-title" style="padding-top:10px;background:#212529;color:white;width:100%;text-align:center;">Inscription</h4>
				<br><br>
			</div>

			<div class="row" style="margin:10px">
				<div class="col-lg-12">
					
				@if( $errors->any() )
					<ul>
						@foreach($errors->all() as $validationError)
							<li>{{$validationError}}</li>
						@endforeach
					</ul>
				@endif

				@if( Session::has('password_error') )
					<span style="color:red"><b>Les mots de passes ne correspondent pas</b></span>
				@endif
				
				@if( Session::has('pseudo_exists') )
					<span style="color:red"><b>Le pseudo que vous avez choisi existe déja</b></span>
				@endif

				</div>	
			</div>
			
			<div class="row" style="margin:10px">
				
					<div class="col-lg-7 ">
						<div class="latest-post-wrap">
						<div class="form-group">
							<label for="user-last-name">Nom : </label>
							<input type="text" class="form-control" name="user-last-name" id="user-last-name" required>
						</div>

						<div class="form-group">
							<label for="user-first-name">Prénom:</label>
							<input type="text" class="form-control" name="user-first-name" id="user-first-name" required>
						</div>

						<div class="form-group">
							<label for="user-email">Email:</label>
							<input type="email" class="form-control" name="user-email" id="user-email" required>
						</div>

						<div class="form-group">
							<label for="user-tel">Téléphone:</label>
							<input type="text" class="form-control" name="user-tel" id="user-tel" required>
						</div>

						<div class="form-group">
							<label for="user-birth-date">Date de naissance</label>
							<input type="date" class="form-control" name="user-birth-date" id="user-birth-date" required>
						</div>
						</div>
					</div>
					
					<div class="col-lg-5">
						
						<div class="form-group">
							<label id="user-pseudo">Pseudo : </label>
							<input type="text" class="form-control" name="user-pseudo" id="user-pseudo" required>
						</div>
						
						<div class="form-group">
							<label id="user-password">Mot de passe : </label>
							<input type="password" class="form-control" name="user-password" id="user-password" required>
						</div>
						
						<div class="form-group">
							<label id="user-password-confirm">Confirmation du mot de passe : </label>
							<input type="password" class="form-control" name="user-password-confirm" id="user-password-confirm" required>
						</div>
					</div>
				

			</div>
			<div class="row">
				<div style="margin-bottom: 50px;margin-left:10px">
					<button type="submit" class="btn btn-success" >S'inscrire</button>	
				</div>
			</div>
			</form>
		</div>
		

</section>

@endsection 