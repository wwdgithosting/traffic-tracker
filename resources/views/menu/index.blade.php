@extends('layout.app')


@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Permissions List</h1>
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
				<div class="card card-flush">
					<!--begin::Card header-->
					<div class="card-header mt-6">
						<!--begin::Card title-->
						<div class="card-title">
							<!--begin::Search-->
							<div class="d-flex align-items-center position-relative my-1 me-5">
								<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
								<span class="svg-icon svg-icon-1 position-absolute ms-6">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
										<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<input type="text" data-kt-permissions-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Permissions" />
							</div>
							<!--end::Search-->
						</div>
						<!--end::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<!--begin::Button-->
							<button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_permission">
								<!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
								<span class="svg-icon svg-icon-3">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
										<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
										<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->Add Permission</button>
							<!--end::Button-->
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
							<!--begin::Table head-->
							<thead>
								<!--begin::Table row-->
								<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
									<th class="min-w-125px">Name</th>
									<th class="min-w-250px">Assigned to</th>
									<th class="min-w-125px">Created Date</th>
									<th class="text-end min-w-100px">Actions</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="fw-semibold text-gray-600">
								@foreach($menues as $menue)
								<tr>
									<!--begin::Name=-->
									<td><a href="javascript:void(0)" class="kt_modal_update_permission" data-details="{{$menue}}">{{$menue->menu_name}}</a></td>
									<!--end::Name=-->
									<!--begin::Assigned to=-->
									<td>
										@foreach($menue->roles as $role)
										<a href="javascript:void(0)" class="badge badge-light-primary fs-7 m-1">{{$role->role_name}}</a>
										@endforeach
									</td>
									<!--end::Assigned to=-->
									<!--begin::Created Date-->
									<td>{{$menue->created_at}}</td>
									<!--end::Created Date-->
									<!--begin::Action=-->
									<td class="text-end">
										<!--begin::Update-->
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3 kt_modal_update_permission" data-details="{{$menue}}">
											<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
											<span class="svg-icon svg-icon-3">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor" />
													<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</button>
										<!--end::Update-->
										<!--begin::Delete-->
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px delete-row" data-id="{{$menue->id}}">
											<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
											<span class="svg-icon svg-icon-3">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
													<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
													<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</button>
										<!--end::Delete-->
									</td>
									<!--end::Action=-->
								</tr>
								@endforeach
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
				<!--begin::Modals-->
				<!--begin::Modal - Add permissions-->
				<div class="modal fade" id="kt_modal_add_permission" tabindex="-1" aria-hidden="true">
					<!--begin::Modal dialog-->
					<div class="modal-dialog modal-dialog-centered mw-650px">
						<!--begin::Modal content-->
						<div class="modal-content">
							<!--begin::Modal header-->
							<div class="modal-header">
								<!--begin::Modal title-->
								<h2 class="fw-bold">Add a Permission</h2>
								<!--end::Modal title-->
								<!--begin::Close-->
								<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-permissions-modal-action="close">
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
								<form id="kt_modal_add_permission_form" class="form" action="#">
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="fs-6 fw-semibold form-label mb-2">
											<span class="required">Permission Name</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Permission names is required to be unique."></i>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid" placeholder="Enter a permission name" name="permission_name" />
										<!--end::Input-->
									</div>
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="fs-6 fw-semibold form-label mb-2">
											<span class="required">URL</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Permission url is required to be unique."></i>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid" placeholder="Enter URL" name="permission_url" />
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Checkbox-->
										<!-- <label class="form-check form-check-custom form-check-solid me-9">
											<input class="form-check-input" type="checkbox" value="" name="permissions_core" id="kt_permissions_core" />
											<span class="form-check-label" for="kt_permissions_core">Set as core permission</span>
										</label> -->
										<!--end::Checkbox-->
									</div>
									<!--end::Input group-->
									<!--begin::Disclaimer-->
									<!-- <div class="text-gray-600">Permission set as a
										<strong class="me-1">Core Permission</strong>will be locked and
										<strong class="me-1">not editable</strong>in future
									</div> -->
									<!--end::Disclaimer-->
									<!--begin::Actions-->
									<div class="text-center pt-15">
										<button type="reset" class="btn btn-light me-3" data-kt-permissions-modal-action="cancel">Discard</button>
										<button type="submit" class="btn btn-primary" data-kt-permissions-modal-action="submit">
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
				<!--end::Modal - Add permissions-->
				<!--begin::Modal - Update permissions-->
				<div class="modal fade" id="kt_modal_update_permission" tabindex="-1" aria-hidden="true">
					<!--begin::Modal dialog-->
					<div class="modal-dialog modal-dialog-centered mw-650px">
						<!--begin::Modal content-->
						<div class="modal-content">
							<!--begin::Modal header-->
							<div class="modal-header">
								<!--begin::Modal title-->
								<h2 class="fw-bold">Update Permission</h2>
								<!--end::Modal title-->
								<!--begin::Close-->
								<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-permissions-modal-action="close">
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
								<!--begin::Notice-->
								<!--begin::Notice-->
								<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
									<!--begin::Icon-->
									<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
									<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
											<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
											<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<!--end::Icon-->
									<!--begin::Wrapper-->
									<div class="d-flex flex-stack flex-grow-1">
										<!--begin::Content-->
										<div class="fw-semibold">
											<div class="fs-6 text-gray-700">
												<strong class="me-1">Warning!</strong>By editing the permission name, you might break the system permissions functionality. Please ensure you're absolutely certain before proceeding.
											</div>
										</div>
										<!--end::Content-->
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Notice-->
								<!--end::Notice-->
								<!--begin::Form-->
								<form id="kt_modal_update_permission_form" class="form" action="#">
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="fs-6 fw-semibold form-label mb-2">
											<span class="required">Permission Name</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Permission names is required to be unique."></i>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="hidden" name="permission_id">
										<input class="form-control form-control-solid" placeholder="Enter a permission name" name="permission_name_edit" />
										<!--end::Input-->
									</div>
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="fs-6 fw-semibold form-label mb-2">
											<span class="required">Permission URL</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Permission url is required to be unique."></i>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid" placeholder="Enter a permission url" name="permission_url_edit" />
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Actions-->
									<div class="text-center pt-15">
										<button type="reset" class="btn btn-light me-3" data-kt-permissions-modal-action="cancel">Discard</button>
										<button type="submit" class="btn btn-primary" data-kt-permissions-modal-action="submit">
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
				<!--end::Modal - Update permissions-->
				<!--end::Modals-->
			</div>
			<!--end::Content container-->
		</div>
		<!--end::Content-->
	</div>
	<!--end::Content wrapper-->
	<!--begin::Footer-->

	<!--end::Footer-->
</div>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/list.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/add-permission.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/update-permission.js')}}"></script>
<script>
	$('.kt_modal_update_permission').click(function() {
		console.log($(this).data('details'));
		$('[name="permission_name_edit"]').val($(this).data('details').menu_name);
		$('[name="permission_url_edit"]').val($(this).data('details').url);
		$('[name="permission_id"]').val($(this).data('details').id);
		$('#kt_modal_update_permission').modal('show');

	});
	$(document).on('click', '.delete-row', function() {
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
				var userURL = "{{url('/').'/menu-delete'}}/" + data_id;
				console.log(userURL);
				$.get(userURL, function(data) {
					console.log(data);

					Swal.fire({
						text: data.message,
						icon: "success",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					}).then(function(result) {


						location.reload(true);

					});

				})
			} else if (result.dismiss === 'cancel') {
				Swal.fire({
					text: "Your data has not been deleted!.",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Ok, got it!",
					customClass: {
						confirmButton: "btn btn-primary",
					}
				});
			}
		});
	});
</script>
@endsection