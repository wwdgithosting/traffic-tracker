@extends('layout.app')


@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
	<!--begin::Content wrapper-->
	<div class="d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->
		<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
			<!--begin::Toolbar container-->
			<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
				<!--begin::Page title-->
				<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
					<!--begin::Title-->
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Users List</h1>
					<!--end::Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">
							<a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Home</a>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">User Management</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">Users</li>
						<!--end::Item-->
					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page title-->
				<!--begin::Actions-->

				<!--end::Actions-->
			</div>
			<!--end::Toolbar container-->
		</div>
		<!--end::Toolbar-->
		<!--begin::Content-->
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<!--begin::Content container-->
			<div id="kt_app_content_container" class="app-container container-xxl">
				<!--begin::Card-->
				<div class="card">
					<!--begin::Card header-->
					<div class="card-header border-0 pt-6">
						<!--begin::Card title-->
						<div class="card-title">
							<!--begin::Search-->
							<div class="d-flex align-items-center position-relative my-1">
								<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
								<span class="svg-icon svg-icon-1 position-absolute ms-6">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
										<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
							</div>
							<!--end::Search-->
						</div>
						<!--begin::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<!--begin::Toolbar-->
							<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

								<!--begin::Add user-->
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
									<span class="svg-icon svg-icon-2">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
											<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->Add User</button>
								<!--end::Add user-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Group actions-->
							<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
								<div class="fw-bold me-5">
									<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
								</div>
								<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
							</div>
							<!--end::Group actions-->
							<!--begin::Modal - Adjust Balance-->
							<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
								<!--begin::Modal dialog-->
								<div class="modal-dialog modal-dialog-centered mw-650px">
									<!--begin::Modal content-->
									<div class="modal-content">
										<!--begin::Modal header-->
										<div class="modal-header">
											<!--begin::Modal title-->
											<h2 class="fw-bold">Export Users</h2>
											<!--end::Modal title-->
											<!--begin::Close-->
											<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
												<span class="svg-icon svg-icon-1">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
														<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
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
											<form id="kt_modal_export_users_form" class="form" action="#">
												<!--begin::Input group-->
												<div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bold">
														<option></option>
														<option value="Administrator">Administrator</option>
														<option value="Analyst">Analyst</option>
														<option value="Developer">Developer</option>
														<option value="Support">Support</option>
														<option value="Trial">Trial</option>
													</select>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
														<option></option>
														<option value="excel">Excel</option>
														<option value="pdf">PDF</option>
														<option value="cvs">CVS</option>
														<option value="zip">ZIP</option>
													</select>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Actions-->
												<div class="text-center">
													<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
													<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
														<span class="indicator-label">Submit</span>
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
							<!--end::Modal - New Card-->
							<!--begin::Modal - Add task-->
							<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
								<!--begin::Modal dialog-->
								<div class="modal-dialog modal-dialog-centered mw-650px">
									<!--begin::Modal content-->
									<div class="modal-content">
										<!--begin::Modal header-->
										<div class="modal-header" id="kt_modal_add_user_header">
											<!--begin::Modal title-->
											<h2 class="fw-bold">Add User</h2>
											<!--end::Modal title-->
											<!--begin::Close-->
											<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
												<span class="svg-icon svg-icon-1">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
														<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</div>
											<!--end::Close-->
										</div>
										<!--end::Modal header-->
										<!--begin::Modal body-->
										<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
											<form id="kt_modal_add_user_form" class="form" action="#" enctype="multipart/form-data">
												<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
													<div class="fv-row mb-7">

														<label class="d-block fw-semibold fs-6 mb-5">Avatar</label>

														<style>
															.image-input-placeholder {
																background-image: url('assets/media/svg/files/blank-image.svg');
															}

															[data-bs-theme="dark"] .image-input-placeholder {
																background-image: url('assets/media/svg/files/blank-image-dark.svg');
															}
														</style>

														<div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">

															<div class="image-input-wrapper w-125px h-125px" style="background-image: url(public/assets/media/avatars/blank.png);"></div>

															<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																<i class="bi bi-pencil-fill fs-7"></i>

																<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
																<input type="hidden" name="avatar_remove" />

															</label>

															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>

															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>

														</div>

														<div class="form-text">Allowed file types: png, jpg, jpeg.</div>

													</div>

													<div class="fv-row mb-7">

														<label class="required fw-semibold fs-6 mb-2">First Name</label>
														<input type="hidden" name="userid" id="userid" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="0" />
														<input type="text" name="firstname" id="firstname" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="" />

													</div>
													<div class="fv-row mb-7">

														<label class="required fw-semibold fs-6 mb-2">Last Name</label>

														<input type="text" name="lastname" id="lastname" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="" />

													</div>

													<div class="fv-row mb-7">

														<label class="required fw-semibold fs-6 mb-2">Email</label>

														<input type="email" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="" />

													</div>
													<div class="fv-row mb-7">

														<label class="required fw-semibold fs-6 mb-2">Company</label>

														<select class="form-select form-control" name="company" id="company">
															<option value="">--select company--</option>
															@foreach($orgs as $org)
															<option value="{{$org->id}}">{{$org->org_name}}</option>
															@endforeach
														</select>


													</div>

													<div class="mb-7">

														<label class="required fw-semibold fs-6 mb-5">Role</label>

														@foreach($roles as $role)

														<div class="d-flex fv-row">

															<div class="form-check form-check-custom form-check-solid">

																<input class="form-check-input me-3 form-control" name="roles" type="radio" value="{{$role->id}}" id="kt_modal_update_role_option_{{$role->id}}" />
																<label class="form-check-label" for="kt_modal_update_role_option_{{$role->id}}">
																	<div class="fw-bold text-gray-800">{{$role->role_name}}</div>
																	<div class="text-gray-600"></div>
																</label>

															</div>

														</div>

														<div class='separator separator-dashed my-5'></div>
														@endforeach
													</div>

												</div>

												<div class="text-center pt-15">
													<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
													<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
														<span class="indicator-label">Submit</span>
														<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													</button>
												</div>

											</form>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="card-body py-4">
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
							<!--begin::Table head-->
							<thead>
								<!--begin::Table row-->
								<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
									<th class="w-10px pe-2">
										<!-- <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
											<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
										</div> -->
									</th>
									<th class="min-w-125px">User</th>
									<th class="min-w-125px">Role</th>
									<th class="min-w-125px">Company</th>
									<th class="min-w-125px">Email</th>
									<th class="min-w-125px">Joined Date</th>
									<th class="text-end min-w-100px">Actions</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<tbody class="text-gray-600 fw-semibold">
								<!--begin::Table row-->
								@foreach($users as $user)

								<tr>
									<!--begin::Checkbox-->
									<td>
										<!-- <div class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="1" />
										</div> -->


									</td>

									<td class="d-flex align-items-center">

										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a href="javascript:void(0)">
												<div class="symbol-label">
													<img src="{{($user->profile_image !='' ) ? url('/').'/public/uploads/photos/'.$user->profile_image : asset('/public/assets/media/avatars/blank.png')}} " alt="{{$user->firstname.' '.$user->lastname}}" class="w-100" />
												</div>
											</a>
										</div>

										<div class="d-flex flex-column">
											<a href="javascript:void(0)" class="text-gray-800 text-hover-primary mb-1 edit-user" data-details="{{$user}}">{{$user->firstname.' '.$user->lastname}}</a>

										</div>

									</td>
									<td>{{$user->role->role_name ?? ''}}</td>

									<td>{{$user->organizations->org_name ?? ''}}</td>

									<!-- <td>
										<div class="badge badge-light fw-bold"></div>

									</td> -->
									<td>{{$user->email ?? ''}}</td>
									<td>{{$user->created_at}}</td>

									<td class="text-end">
										<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions

											<span class="svg-icon svg-icon-5 m-0">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
												</svg>
											</span>
										</a>

										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">

											<div class="menu-item px-3">
												<a href="javascript:void(0)" class="menu-link px-3 edit-user" data-details="{{$user}}">Edit</a>
											</div>

											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3 delete-user" data-id="{{$user->id}}" data-kt-users-table-filter="delete_row">Delete</a>
											</div>

										</div>

									</td>

								</tr>
								@endforeach
							</tbody>
						</table>
						<!--end::Table-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Content container-->
		</div>
		<!--end::Content-->
	</div>
	<!--end::Content wrapper-->
	<!--begin::Footer-->

	<!--end::Footer-->
</div>
<script>
	$(document).ready(function() {

		$(document).on('click', '.edit-user', function() {
			var userData = $(this).data('details');
			console.log(userData);
			var imageUrl = (userData.profile_image != null) ? '/public/uploads/photos/' + userData.profile_image : 'public/assets/media/avatars/blank.png';
			console.log(imageUrl)
			$('#userid').val(userData.id);
			$('#firstname').val(userData.firstname);
			$('#lastname').val(userData.lastname);
			$('#email').val(userData.email);
			$('#company').val(userData.company);
			$('#kt_modal_update_role_option_' + userData.roles).attr('checked', 'checked');
			//$("#radio_1").attr('checked', 'checked');
			$('.image-input-wrapper').removeAttr("style");
			$('.image-input-wrapper').css("background-image", "url(" + imageUrl + ")");

			$('#kt_modal_add_user').modal('show');
		})

		$(document).on('click', '.delete-user', function() {
			var data_id = $(this).data('id');
			Swal.fire({
				text: "Are you sure you would like to delete?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function(result) {
				if (result.value) {

					var userURL = "{{url('/').'/user-delete'}}/" + data_id;
					$.get(userURL, function(data) {

						Swal.fire({
							text: data.message,
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary",
							}
						}).then(function(result) {
							if (result.value) {
								location.reload(true);
							} else if (result.dismiss === 'cancel') {
								Swal.fire({
									text: "Your form has not been cancelled!.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-primary",
									}
								});
							}
						});;

					})

				} else if (result.dismiss === 'cancel') {
					Swal.fire({
						text: "Your request has been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		})
	})
</script>
@push('scripts')

@endpush

@endsection