@extends('layouts.app-front')
@section('title', 'Bricks List')
@section('content')
@php $orderArr = []; @endphp
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
							<div class="container custom_container pt-3 ">
								<div class="tab-teaser mt-5 pt-5">
									<div class="tab-menu">
										<ul>
											<li><a href="#" class="active" data-rel="tab-1">
													My Briks
											</a></li>
											<li><a href="#" data-rel="tab-2" class="">
													Performance
											</a></li>
											<li>
												<a href="#" data-rel="tab-3" class="">
													Settings
												</a>
											</li>
											
										</ul>
									</div>

									<div class="tab-main-box mt-9 mb-3">
										<div class="tab-box" id="tab-1" style="display:block;">
											<div class="card mt-9 mb-3">
												<!--begin::Card header-->
													<!--begin::Card body-->
													<div class="card-body">
														<!--begin::Table-->
														<table class="table brickstable" id="kt_table_users">
															<!--begin::Table head-->
															<thead>
																<!--begin::Table row-->
																<tr class="">
																	<th class="min-w-125px">Brik</th>
																	<th class="min-w-125px">Title</th>
																	<th class="min-w-125px">Total Briks</th>
																	<th class="min-w-125px">Price</th>
																	<th class="min-w-125px">Image</th>
																	<th class="text-center min-w-100px">Edit</th>
																</tr>
																<!--end::Table row-->
															</thead>
															<!--end::Table head-->
															<!--begin::Table body-->
															<tbody class="text-gray-600 fw-bold">
																@foreach($boxes as $box)
																@php

																if(!in_array($box->new_order_id,$orderArr)){
																	array_push($orderArr,$box->new_order_id);
																@endphp
																<!--begin::Table row-->
																<tr>
																	<!--begin::Role=-->
																	<td>{{$box->new_order_id}}</td>
																	<!--end::Role=-->
																	<!--begin::Last login=-->
																	<td>{{$box->title}}</td>
																	<td>
																		<div class="">{{$box->order->total_bricks}}</div>
																	</td>
																	<!--end::Last login=-->
																	<!--begin::Two step=-->
																	
																	<!--end::Two step=-->
																	<!--begin::Joined-->
																	<td>{{$box->order->price}} ETH</td>
																	<!--begin::Joined-->
																		<!--begin::User=-->
																		<td class="d-flex align-items-center">
																		<!--begin:: Avatar -->
																		<div class="symbol overflow-hidden me-3">
																			<a href="#">
																				<div class="symbol-label">
																					@if($box->local_server_image == null || $box->local_server_image == 1 )
																						<img src="{{url('img/logo.svg')}}" alt="Emma Smith" class="w-100" />
																					@else	
																						<img src="{{asset($box->local_server_image)}}" alt="Emma Smith" class="w-100" />
																					@endif
																				</div>
																			</a>
																		</div>
																		<!--end::Avatar-->
																	</td>
																	<!--end::User=-->
																	<!--begin::Action=-->
																	<td class="text-center">
																		<a href="#" class="btn btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																		<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
																		<span class="svg-icon svg-icon-5 m-0">
																			<img src="{{asset('img/dotss.png')}}" alt="image" />
																		</span>
																		<!--end::Svg Icon--></a>
																		<!--begin::Menu-->
																		<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
																			<!--begin::Menu item-->
																			<div class="menu-item px-3">
																				@if($box->image == null)
																					<a href="#" data-id ="{{$box->order_id}}" class="menu-link px-3 upload-nft" >Upload NFT</a>
																				@else
																					<a href="#" data-id ="{{$box->order_id}}" class="menu-link px-3 upload-nft" >Modify NFT</a>
																				@endif
																				<!-- data-bs-toggle="modal" data-bs-target="#kt_modal_add_user" -->
																			</div>
																			<!--end::Menu item-->
																			<!--begin::Menu item-->
																			<div class="menu-item px-3">
																				<a href="{{route('brickdetail',$box->id)}}" class="menu-link px-3 nft-detail" data-kt-users-table-filter="delete_row">Details</a>
																			</div>
																			<!--end::Menu item-->
																		</div>
																		<!--end::Menu-->
																	</td>
																	<!--end::Action=-->
																</tr>
																<!--end::Table row-->
																@php }  @endphp
																@endforeach
															</tbody>
															<!--end::Table body-->
														</table>
														<!--end::Table-->
													</div>
												<!--end::Card body-->
											</div>
										</div>
										<div class="tab-box" id="tab-2">
											 <div class="comingsoon mt-9 ">
												<h1 class="text-center">comingsoon...</h1>
											 </div>
										</div>
										<div class="tab-box" id="tab-3">
											 <div class="mt-9 settingsbrik">
											    <div class="tab-menu2">
													<ul>
														<li><a href="#" class="active" data-rel="tab2-1">
														Change Name/User Name
														</a></li>
														<li><a href="#" data-rel="tab2-2" class="">
														Change Password
														</a></li>
														<li>
															<button  class="metamaskbtn" id="metamaskbtn">
																<span class="icon">
																	<img src="./img/metamask.svg" alt="">
																</span>
																<span id="metamaskbtnspan">Connect with MetaMask</span>
															</button>
														</li>
														
													</ul>
												</div>
												<div class="tab-box2" id="tab2-1" style="display:block;">
														<div class="container  ">
															<div class="card">
																<div class="card-header border-0 cursor-pointer" role="button">
																	<!--begin::Card title-->
																	<div class="card-title m-0">
																		<h3 class="fw-bolder m-0">Change User Name</h3>
																	</div>
																	<!--end::Card title-->
																</div>
																<form id="frmUserDetail" class="form card-body border-top p-9"  onsubmit="return false" enctype="multipart/form-data">
																	@csrf
																	<input type="hidden" class="brick_order_class" name="brick_order_id" id="brick_order_id" value=""/>
																	<!--begin::Scroll-->
																	<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll2" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" >
																		<!--begin::Input group-->
																		<div class="fv-row mb-6">
																			<!--begin::Label-->
																			<label class="d-block fw-bold fs-8 mb-5">Profile Image</label>
																			<!--end::Label-->
																			<!--begin::Image input-->
																			<div class="image-input image-input-outline" data-kt-image-input="true" >
																				<!--begin::Preview existing avatar-->
																				@php $url = ($users->profile_image) ? URL::to($users->profile_image) : 'assets/media/avatars/blank.png' @endphp
																				<div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{$url}}')"></div>
																				<!--end::Preview existing avatar-->
																				<!--begin::Label-->
																				<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																					<i class="bi bi-pencil-fill fs-7"></i>
																					<!--begin::Inputs-->
																					<input type="file" id="image_url" name="image_url" accept=".png, .jpg, .jpeg, svg" />
																					<input type="hidden" id="image_url_hidden" name ="image_url_hidden" value=""/>
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
																		</div>
																		<!--end::Input group-->
																		<!--begin::Input group-->
																		<div class="fv-row mb-7">
																			<!--begin::Label-->
																			<label class="fw-bold fs-8 mb-2">User Name</label>
																			<!--end::Label-->
																			<!--begin::Input-->
																			<input type="text" name="User_name" id="User_name" maxlength="40" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="User Name" value="{{ $users->name }}" />
																			<!--end::Input-->
																		</div>
																		<!--end::Input group-->
																		<!--begin::Input group-->
																	
																		<!--end::Input group-->
																		<!--begin::Input group-->
																		<div class="fv-row mb-7">
																			<!--begin::Label-->
																			<label class="fw-bold fs-8 mb-2">Email</label>
																			<!--end::Label-->
																			<!--begin::Input-->
																			<input type="text" name="Email" id="Email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Email" value="{{ $users->email }}" />
																			<!--end::Input-->
																		</div>
																		<!--end::Input group-->
																		<!--begin::Input group-->
																		<div class="fv-row mb-7">
																			<!--begin::Label-->
																			<label class="fw-bold fs-8 mb-2">Social Accounts</label>
																			<span class="specialinfospan ">(Help collectors verify your account by connecting social accounts)</span>
																			<!--end::Label-->
																			<!--begin::Input-->
																			<div class="usersocial">
																				<div class="accountsuser">
																					<div class="useraccountname tw">
																						Twitter
																					</div>
																					<div class="connectaccoubnt">
																					<button type="submit" class="btn_connect" >
																						Connect
																					</button>
																					</div>
																				</div>
																				<div class="accountsuser">
																					<div class="useraccountname insta">
																						Instagram
																					</div>
																					<div class="connectaccoubnt">
																					<button type="submit" class="btn_connect" >
																						Connect
																					</button>
																					</div>
																				</div>
																				<div class="accountsuser">
																					<div class="useraccountname lin">
																						Instagram
																					</div>
																					<div class="connectaccoubnt">
																					<button type="submit" class="btn_connect" >
																						Connect
																					</button>
																					</div>
																				</div>
																			</div>
																			<!--end::Input-->
																		</div>
																		<!--end::Input group-->
																		<!--begin::Input group-->
																		<div class="fv-row mb-7">
																			<!--begin::Label-->
																			<label class=" fw-bold fs-8 mb-2">Bio</label>
																			<!--end::Label-->
																			<!--begin::Input-->
																			<textarea name="Bio" id="Bio" maxlength="400" placeholder="Bio" class="form-control form-control-solid mb-3 mb-lg-0">{{$users->bio}}</textarea>
																			<!--end::Input-->
																		</div>
																		<!--end::Input group-->
																	
																	</div>
																	<!--end::Scroll-->
																	<!--begin::Actions-->
																	<div class="text-center pt-0">
																		<button type="submit" class="btn btn-primary mb-0" id="saveusers" data-kt-users-modal-action="submit">
																			<span class="indicator-label">Save</span>
																			<span class="indicator-progress">Please wait...
																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																		</button>
																	</div>
																	<!--end::Actions-->
																</form>
															</div>
														</div>
												</div>
												<div class="tab-box2" id="tab2-2">
													<div class="content flex-row-fluid " >
														@include('partials.front.header')
														@if ($errors->any())
															<div class="alert alert-danger">
																@foreach ($errors->all() as $error)
																	{{ $error }}
																@endforeach
																
															</div>
														@endif
														@if(Session::has('error'))
															<p class="alert alert-danger">{{ Session::get('error') }}</p>
														@endif
														@if(Session::has('success'))
															<p class="alert alert-success">{{ Session::get('success') }}</p>
														@endif
															<div class="container">
																<!--begin::Card-->
																<div class="card card ">
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
																		<form id="kt_account_profile_details_form" action="{{route('updatepassword')}}" method="post" class="form" onsubmit="return false">
																		@csrf
																		<input type="hidden" name="token" value="{{ app('request')->route('token') }}">
																			<!--begin::Card body-->
																			<div class="card-body border-top p-9">
																				<!--begin::Input group-->
																				<div class="row mb-6">
																					<!--begin::Label-->
																					<label class="col-lg-4 col-form-label required fw-bold fs-8">Old Password</label>
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
																					<label class="col-lg-4 col-form-label required fw-bold fs-8">Password</label>
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
																					<label class="col-lg-4 col-form-label required fw-bold fs-8">Confirm password</label>
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
													</div>
												</div>
												<div class="tab-box2" id="tab2-3">
													<button  class="metamaskbtn" id="metamaskbtn">
														<span class="icon">
															<img src="./img/metamask.svg" alt="">
														</span>
														<span id="metamaskbtnspan">Connect with MetaMask</span>
													</button>
												</div>
												
											 </div>
										</div>
									</div>
								</div>
								<!--begin::Card-->
								
								<!--end::Card-->

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
								<div class="btn btn-icon btn-sm btn-active-icon-primary" onclick="hideUploadNFTPopup()">
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
									<input type="hidden" class="brick_order_id" name="brick_order_id" id="brick_order_id" value=""/>
									<!--begin::Scroll-->
									<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="d-block fw-bold fs-6 mb-5">Image</label>
											<!--end::Label-->
											<!--begin::Image input-->
											<div class="image-input image-input-outline briksimage" data-kt-image-input="true" >
												<!--begin::Preview existing avatar-->
												<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/blank.png)"></div>
												<!--end::Preview existing avatar-->
												<!--begin::Label-->
												<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
													<i class="bi bi-pencil-fill fs-7"></i>
													<!--begin::Inputs-->
													<input type="file" id="image_url" name="image_url" accept=".png, .jpg, .jpeg, svg" />
													<input type="hidden" id="image_url_hidden" name ="image_url_hidden" value = "" />
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
											<label class=" fw-bold fs-6 mb-2">Listing Name</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input type="text" name="listing_name" id="listing_name" maxlength="40" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Listing Name" />
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class=" fw-bold fs-6 mb-2">NFT Type</label>
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
											<label class=" fw-bold fs-6 mb-2">Description</label>
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

@push('scripts')
	<script src="{{asset('js/front/brikslist.js')}}"></script>
@endpush