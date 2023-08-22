@extends('layouts.app-admin')
@section('title', 'Admin Change Password')
@section('content')

<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
	<div class="page d-flex flex-row flex-column-fluid">
		<!--begin::Aside-->
		@include('partials.admin.aside')
		<!--end::Aside-->
		<!--begin::Wrapper-->
		<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
			<!--begin::Header-->
			@include('partials.admin.header')
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
						@if ($errors->any())
							<div class="alert alert-danger">
								@foreach ($errors->all() as $error)
									{{ $error }}
								@endforeach
								
							</div>
						@endif
						@if(Session::has('error'))
							<div class="alert alert-danger">{{ Session::get('error') }}</div>
						@endif
						@if(Session::has('success'))
							<div class="alert alert-success">{{ Session::get('success') }}</div>
						@endif
								
							<div class="card card mt-9">
									<!--begin::Card header-->
									<div class="card-header border-0 cursor-pointer" role="button">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bolder m-0">Change Password</h3>
										</div>
										<!--end::Card title-->
									</div>
									<!--begin::Card header-->
									<!--begin::Content-->
									<div id="kt_account_profile_details" class="collapse show">
										<!--begin::Form-->
										<form id="kt_account_profile_details_form" action="{{route('admin.updatepassword')}}" method="post" class="form">
											@csrf
											<!--begin::Card body-->
											<div class="card-body border-top p-9">
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label required fw-bold fs-6">Old Password</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<input type="password" name="old_password" class="form-control form-control-lg form-control-solid" placeholder="Old Password" required/>
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label required fw-bold fs-6">Password</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder="Password" required/>
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label required fw-bold fs-6">Confirm password</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<input type="password" name="password_confirmation" class="form-control form-control-lg form-control-solid" placeholder="Confirm Password" required/>
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->
											</div>
											<!--end::Card body-->
											<!--begin::Actions-->
											<div class="card-footer d-flex justify-content-end py-6 px-9">
												<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
											</div>
											<!--end::Actions-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Content-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					@include('partials.admin.footer')
					<!--end::Footer-->
				
				<!--end::Wrapper-->
		</div>
	</div>
</div>

@endsection