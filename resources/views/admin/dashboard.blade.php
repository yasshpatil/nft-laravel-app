@extends('layouts.app-admin')
@section('title', 'Admin Dashboard')
@section('content')

<!--begin::Root-->
<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid justify-content-end" >
				<!--begin::Aside-->
				@include('partials.admin.aside')
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column rightsideadmin" id="kt_wrapper">
					<!--begin::Header-->
					@include('partials.admin.header')
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Row-->
							<div class="row gy-5 g-xl-10">
								<!--begin::Col-->
								<div class="col-xl-4">
									<!--begin::Mixed Widget 13-->
									<div class="card card-xl-stretch mb-xl-10" style="background-color: #F7D9E3">
										<!--begin::Body-->
										<div class="card-body d-flex flex-column">
											<!--begin::Wrapper-->
											<div class="d-flex flex-column flex-grow-1">
												<!--begin::Title-->
												<a href="{{route('admin.brickslist')}}" class="text-dark text-hover-primary fw-bolder fs-3">Sold Briks</a>
												<!--end::Title-->
												<!--begin::Chart-->
												<div class="mixed-widget-13-chart" style="height: 100px"></div>
												<!--end::Chart-->
											</div>
											<!--end::Wrapper-->
											<!--begin::Stats-->
											<div class="pt-5">
												<!--begin::Number-->
												<span class="text-dark fw-bolder fs-3x me-2 lh-0">{{$bricks_count}}</span>
												<!--end::Number-->
											</div>
											<!--end::Stats-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Mixed Widget 13-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xl-4">
									<!--begin::Mixed Widget 14-->
									<div class="card card-xxl-stretch mb-xl-10" style="background-color: #CBF0F4">
										<!--begin::Body-->
										<div class="card-body d-flex flex-column">
											<!--begin::Wrapper-->
											<div class="d-flex flex-column flex-grow-1">
												<!--begin::Title-->
												<a href="{{route('admin.userslist')}}" class="text-dark text-hover-primary fw-bolder fs-3">Total Users</a>
												<!--end::Title-->
												<!--begin::Chart-->
												<div class="mixed-widget-14-chart" style="height: 100px"></div>
												<!--end::Chart-->
											</div>
											<!--end::Wrapper-->
											<!--begin::Stats-->
											<div class="pt-5">
												<!--begin::Number-->
												<span class="text-dark fw-bolder fs-3x me-2 lh-0">{{$users_count}}</span>
												<!--end::Number-->
											</div>
											<!--end::Stats-->
										</div>
									</div>
									<!--end::Mixed Widget 14-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xl-4">
									<!--begin::Mixed Widget 14-->
									<div class="card card-xxl-stretch mb-xl-10" style="background-color: #CBD4F4">
										<!--begin::Body-->
										<div class="card-body d-flex flex-column">
											<!--begin::Wrapper-->
											<div class="d-flex flex-column flex-grow-1">
												<!--begin::Title-->
												<a href="{{route('admin.orderslist')}}" class="text-dark text-hover-primary fw-bolder fs-3">Total Orders</a>
												<!--end::Title-->
												<!--begin::Chart-->
												<div class="mixed-widget-14-chart" style="height: 100px"></div>
												<!--end::Chart-->
											</div>
											<!--end::Wrapper-->
											<!--begin::Stats-->
											<div class="pt-5">
												<!--begin::Number-->
												<span class="text-dark fw-bolder fs-3x me-2 lh-0">{{$orders_count}}</span>
												<!--end::Number-->
											</div>
											<!--end::Stats-->
										</div>
									</div>
									<!--end::Mixed Widget 14-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
							
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					@include('partials.admin.footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->

@endsection