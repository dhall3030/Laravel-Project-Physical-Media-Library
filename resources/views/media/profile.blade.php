@extends('layout')





@section('content')

<section id="media_profile">

	<div class="container media-profile">

	
    
   <p><strong>Name:</strong> {{$media->name}}</p>

	<!--<p>{{$media->media_type_id}}</p>-->

	<p><strong>Media Type:</strong> {{$media->media_type->name}}</p>

	<p><strong>Description:</strong></p>

	<p>{{$media->description}}</p>

	
	
	</div>

</section>




@stop