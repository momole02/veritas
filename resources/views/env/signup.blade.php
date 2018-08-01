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
	<div class="container" style="background: white">
		<div class="row" style="margin:10px">
		<form>
			<h3>Saisissez les différentes informations pour vous inscrire</h3>
			<br><br>
			<div class="row">
				<div class="col-lg-7">
					<div class="form-group">
						<label for="user-last-name">Nom : </label>
						<input type="text" class="form-control" name="user-last-name" id="user-last-name">
					</div>

					<div class="form-group">
						<label for="user-first-name">Prénom:</label>
						<input type="text" class="form-control" name="user-first-name" id="user-first-name">
					</div>

					<div class="form-group">
						<label for="user-email">Email:</label>
						<input type="email" class="form-control" name="user-email" id="user-email">
					</div>

					<div class="form-group">
						<label for="user-tel">Téléphone:</label>
						<input type="text" class="form-control" name="user-tel" id="user-tel">
					</div>

					<div class="form-group">
						<label for="user-birth-date">Date de naissance</label>
						<input type="date" class="form-control" name="user-birth-date" id="user-birth-date">
					</div>
				</div>
				
				<div class="col-lg-5">
					
					<div class="form-group">
						<label id="user-pseudo">Pseudo : </label>
						<input type="text" class="form-control" name="user-pseudo" id="user-pseudo">
					</div>
					
					<div class="form-group">
						<label id="user-password">Mot de passe : </label>
						<input type="text" class="form-control" name="user-password" id="user-password">
					</div>
					
					<div class="form-group">
						<label id="user-password-confirm">Confirmation du mot de passe : </label>
						<input type="text" class="form-control" name="user-password-confirm" id="user-password-confirm">
					</div>

				</div>


				
			</div>
			<div id="row">
				<div style="margin-bottom: 50px">
					<button type="submit" class="btn btn-success" >S'inscrire</button>	
				</div>
			</div>
		</form>	
		</div>
	</div>
</section>

@endsection 