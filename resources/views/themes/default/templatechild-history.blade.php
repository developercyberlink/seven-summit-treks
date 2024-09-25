@extends('themes.default.common.master')
@section('post_title', '')
@section('meta_keyword', '')
@section('meta_description', '')
@section('content')
	 @include('themes.default.common.page-banner2')
	<section class="uk-section bg-white uk-position-relative uk-wave-white-top" uk-scrollspy="cls: uk-animation-slide-left-small; target:div,  li, img, p, h1;  delay: 50; repeat: false;">
		<div class="uk-container">
			<div>
			{!! $data->post_content !!}				
			</div>
		</div>
	</section>
@endsection