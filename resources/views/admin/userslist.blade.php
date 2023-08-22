@extends('layouts.app-admin')
@section('title', 'Admin Users List')
@section('content')

<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
	<div class="page d-flex flex-row flex-column-fluid justify-content-end">
		<!--begin::Aside-->
		@include('partials.admin.aside')
		<!--end::Aside-->
		<!--begin::Wrapper-->
		<div class="wrapper d-flex flex-column rightsideadmin" id="kt_wrapper">
			<!--begin::Header-->
			@include('partials.admin.header')
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Card-->
							<div class="card">
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5" id="user_list">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
												<th class="min-w-125px">ID</th>
												<th class="min-w-125px">Name</th>
												<th class="min-w-125px">Surname</th>
												<th class="min-w-125px">Email</th>
												<th class="min-w-125px">Date of Birth</th>
												<th class="min-w-125px" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="" data-bs-original-title="How much do you know about NFTs/Crypto">Qestion 1</th>
												<th class="min-w-125px" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="" data-bs-original-title="How long have you been involved the NFTs/Crypto space">Qestion 2</th>
												<th class="min-w-125px" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="" data-bs-original-title="What is your purpose of invesing in NFTs/Crypto">Qestion 3</th>
												<th class="min-w-125px">Created AT</th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-bold">
										
											
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
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