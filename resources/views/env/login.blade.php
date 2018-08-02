 @extends('layout')

@section('pageTitle')
VERITAS- Connexion
@endsection

@section('content')
<section class="top-post-area pt-10">
	<div class="container no-padding">
		<div class="row" >
			<div class="col-lg-12">
				<div class="hero-nav-area" style="background:#212529;">
					<h1 class="text-white">Connexion</h1>
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
			<form method="post" action="{{route('envDoLogin')}}">
			@csrf
			<div class="row">
				
				<h4 class="cat-title" style="padding-top:10px;background:#212529;color:white;width:100%;text-align:center;">Connexion</h4>
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

				@if( Session::has("id_error") )
					<span style="color:red"><b>Identifiants invalides</b></span>
				@endif 
				</div>	
			</div>
			
			<div class="row" style="margin:10px">
				
					<div class="col-lg-4 offset-lg-4 ">
						<div class="latest-post-wrap">
						<div class="form-group">
							<label for="user-pseudo">Pseudo : </label>
							<input type="text" class="form-control" name="user-pseudo" id="user-last-name" required>
						</div>

						<div class="form-group">
							<label for="user-password">Mot de passe:</label>
							<input type="password" class="form-control" name="user-password" id="user-password" required>
						</div>

						<div style="margin-bottom: 50px;">
							<button type="submit" class="btn btn-success" >Connexion</button>	
						</div>
						
						</div>

					</div>

			</div>

			</form>
		</div>
		

</section>

@endsection 