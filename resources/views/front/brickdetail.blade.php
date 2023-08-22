@extends('layouts.app-front')
@section('title', 'Bricks List')
@section('content')
<!--begin::Toolbar-->
<!-- <div class="toolbar py-5 py-lg-5" id="kt_toolbar"></div> -->
<!--end::Toolbar-->
<!--begin::Container-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start ">
						<!--begin::Post-->
						@include('partials.header')
						<!--begin::Post-->
						<div class="content flex-row-fluid" id="kt_content">
							@include('partials.front.header')
							<div class="d-flex flex-column flex-xl-row p-5 h-75 h-xl-auto overflow-auto">
								<!--begin::Sidebar-->
								<div class="flex-column flex-xl-row-auto mt-4 w-100 w-xl-350px ">
									<!--begin::Card-->
									<div class="card  h-100">
										<!--begin::Card body-->
										<div class="card-body pt-15">
											<!--begin::Summary-->
											<div class="d-flex flex-center flex-column mb-5">
												<!--begin::Avatar-->
												<div class="symbol symbol-100px symbol-circle mb-7">
												    @if($box->image != null && $box->local_server_image != 1)
														<img src="{{url($box->local_server_image)}}" alt="image" />
													@else
														<img src="{{asset('img/logo.svg')}}" alt="image" />
													@endif
												</div>
												<!--end::Avatar-->
												<!--begin::Name-->
												<a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{$box->title}}</a>

												@if($box->image == null)
													<a href="#" data-id ="{{$box->order_id}}" class="menu-link px-3 upload-nft" >Upload NFT</a>
												@else
													<a href="#" data-id ="{{$box->order_id}}" class="menu-link px-3 upload-nft" >Modify NFT</a>
												@endif
												<!--end::Name-->
											</div>
											<!--end::Summary-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Sidebar-->
								<!--begin::Content-->
								<div class="flex-xl-row-fluid mt-4 ms-xl-15">
									
									<!--begin:::Tab content-->
									<div class="tab-content h-100" id="myTabContent">
										<!--begin:::Tab pane-->
										<div class="tab-pane fade show active h-100" id="kt_customer_view_overview_tab" role="tabpanel">
											<!--begin::Card-->
											<div class="card pt-4 h-100">
												<!--begin::Card header-->
												<div class="card-header border-0">
													<!--begin::Card title-->
													<div class="card-title">
														<h2 class="fw-bolder mb-0">Order Detail</h2>
													</div>
													<!--end::Card title-->
													
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div id="kt_customer_view_payment_method" class="card-body pt-0">
													<!--begin::Option-->
													<div class="py-0" data-kt-customer-payment-method="row">
														<!--begin::Body-->
														<div id="kt_customer_view_payment_method_1" class="collapse show fs-6" data-bs-parent="#kt_customer_view_payment_method">
															<!--begin::Details-->
															<div class="d-flex flex-wrap py-5 tableouterbriks">
																<!--begin::Col-->
																<div class="flex-equal me-5">
																	<table class="table table-flush fw-bold gy-1">
																		<tr>
																			<td class="text-muted min-w-125px w-125px">Order ID</td>
																			<td class="text-gray-800">{{$box->order_id}}</td>
																		</tr>
																		<tr>
																			<td class="text-muted min-w-125px w-125px">NFT Type</td>
																			@if($box->nftType != null)
																			<td class="text-gray-800">{{$box->nftType->name}}</td>
																			@endif
																		</tr>
																		<tr>
																			<td class="text-muted min-w-125px w-125px">Price</td>
																			<td class="text-gray-800">{{$box->order->price}}</td>
																		</tr>
																		<tr>
																			<td class="text-muted min-w-125px w-125px">Total Bricks</td>
																			<td class="text-gray-800">{{$box->order->total_bricks}}</td>
																		</tr>
																		<tr>
																			<td class="text-muted min-w-125px w-125px">Description</td>
																			<td class="text-gray-800">{{$box->description}}</td>
																		</tr>
																		<tr>
																			<td class="text-muted min-w-125px w-125px">Entry Date</td>
																			<td class="text-gray-800">{{\Carbon\Carbon::parse($box->order->created_at)->format('d M Y')}}</td>
																		</tr>
																	</table>
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="flex-equal">
																	<table class="table table-flush fw-bold gy-1">
																		<tr>
																			<td class="text-muted min-w-125px w-125px">Your Wallet Address</td>
																			<td class="text-gray-800">{{$box->order->user_wallet}}</td>
																		</tr>
																		<tr>
																			<td class="text-gray-800" colspan="2">
																			<a id="open_sea_detail" href="{{ env('OPEN_SEA') }}/{{$box->token_id}}" target="_blank">
																				<img src="{{asset('/img/view2.svg')}}" alt="">
																			</a>
																			</td>
																		</tr>
																		<tr>
																			<td class="text-gray-800" colspan="2">
																			<a id="ether_scan_detail" href="{{ env('ETHER_SCAN') }}{{$box->ether_scan_link}}" target="_blank">
                    															<img src="{{asset('/img/view1.svg')}}" alt="">
                															</a>
																			</td>
																		</tr>
																		
																	</table>
																</div>
																<!--end::Col-->
															</div>
															<!--end::Details-->
														</div>
														<!--end::Body-->
													</div>
													<!--end::Option-->
													
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Card-->
										</div>
										<!--end:::Tab pane-->
										
									</div>
									<!--end:::Tab content-->
								</div>
								<!--end::Content-->
							</div>
						</div>
						<!--end::Post-->
					</div>
					<!--end::Container-->
									<!--begin::Modal - Add task-->
				<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true" style="display:none;">
					<!--begin::Modal dialog-->
					<div class="modal-dialog modal-dialog-centered mw-650px">
						<!--begin::Modal content-->
						<div class="modal-content">
							<!--begin::Modal header-->
							<div class="modal-header" id="kt_modal_add_user_header">
								<!--begin::Modal title-->
								<h2 class="fw-bolder">Upload NFT</h2>
								<!--end::Modal title-->
								<!--begin::Close-->
								<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
									<span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
											<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
								<!--end::Close-->
							</div>
							<!--end::Modal header-->
							<!--begin::Modal body-->
							<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
								<!--begin::Form-->
								<form id="upload_nft_form" class="form" action="{{route('boxes.uploadnft')}}" enctype="multipart/form-data">
									<input type="hidden" class="brick_order_class" name="brick_order_id" id="brick_order_id" value="" />
									<!--begin::Scroll-->
									<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="d-block fw-bold fs-6 mb-5">Image</label>
											<!--end::Label-->
											<!--begin::Image input-->
											<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style=""></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
													<i class="bi bi-pencil-fill fs-7"></i>
													<!--begin::Inputs-->
													<input type="file" id="image_url" name="image_url" accept=".png, .jpg, .jpeg, svg" />
													<input type="hidden" id="image_url_hidden" name ="image_url_hidden" />
													<input type="hidden" name="avatar_remove" />
													<!--end::Inputs-->
												</label>
												<!--end::Label-->
												<!--begin::Cancel-->
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
													<i class="bi bi-x fs-2"></i>
												</span>
												<!--end::Cancel-->
												<!--begin::Remove-->
												<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
													<i class="bi bi-x fs-2"></i>
												</span>
												<!--end::Remove-->
											</div>
											<!--end::Image input-->
											<!--begin::Hint-->
											<div class="form-text">Allowed file types: png, jpg, jpeg. svg</div>
											<!--end::Hint-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="fw-bold fs-6 mb-2">Listing Name</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input type="text" name="listing_name" id="listing_name" maxlength="40" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Listing Name" />
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="fw-bold fs-6 mb-2">NFT Type</label>
											<!--end::Label-->
											<!--begin::Input-->
											<select class="form-select form-select-solid" id="nft_type" data-control="select2" data-hide-search="true" data-placeholder="Select a NFT Type" name="nft_type">
												<option value="">Select NFT Type...</option>
												@foreach($nft_types as $nft_type)
													<option value="{{$nft_type->id}}">{{$nft_type->name}}</option>
												@endforeach
											</select>
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="fw-bold fs-6 mb-2">Website URL</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input type="text" name="website_url" id="website_url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Website URL" />
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="fw-bold fs-6 mb-2">Description</label>
											<!--end::Label-->
											<!--begin::Input-->
											<textarea name="description" id="description" maxlength="400" placeholder="Description" class="form-control form-control-solid mb-3 mb-lg-0"></textarea>
											<!--end::Input-->
										</div>
										<!--end::Input group-->
									
									</div>
									<!--end::Scroll-->
									<!--begin::Actions-->
									<div class="text-center pt-15">
										<button type="submit" class="btn btn-primary" id="upload_nft_btn" data-kt-users-modal-action="submit">
											<span class="indicator-label">Publish NFT</span>
											<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										</button>
									</div>
									<!--end::Actions-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Modal body-->
						</div>
						<!--end::Modal content-->
					</div>
					<!--end::Modal dialog-->
				</div>
				<!--end::Modal - Add task-->
@endsection