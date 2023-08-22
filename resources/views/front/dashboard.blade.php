@extends('layouts.app-front')
@section('title', 'Dashboard')
@section('content')
<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-5" id="kt_toolbar" style="display:none;"></div>
<!--end::Toolbar-->
<!--begin::Container-->

<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start ">
	<!--begin::Post-->
	@include('partials.header')
	<div class="content flex-row-fluid" id="kt_content">
		@include('partials.front.header')
		<!--begin::Row--> 
		<div class="rightbarinnercontent custom_container innerrightside">
			<div class="homelinker">
				Dashboard
			</div>

		</div>
		<!--end::Row-->
	</div>
	<!--end::Post-->
</div>
<!--end::Container-->
@endsection