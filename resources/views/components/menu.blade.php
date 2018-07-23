@php
	$links = [
		'ACCUEIL' => '#',
		'NEWS' => '#',
		'MINISTERES' => '#',
		'POSTS' => '#',
		'A PROPOS' => '#'
	];

@endphp 

@foreach( $links as $name=>$href )
	<li ><a href="{{$href}}">{{$name}}</a></li>
@endforeach