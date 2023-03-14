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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Partners List</h1>
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
						<li class="breadcrumb-item text-muted">Partner</li>
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
								<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Partners" />
							</div>
							<!--end::Search-->
						</div>
						<!--begin::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<!--begin::Toolbar-->
							<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">


								<!--end::Export-->
								<!--begin::Add customer-->
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Partner</button>
								<!--end::Add customer-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Group actions-->
							<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
								<div class="fw-bold me-5">
									<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
								</div>
								<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
							</div>
							<!--end::Group actions-->
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<!--begin::Table-->

						<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
							<!--begin::Table head-->
							<thead>
								<!--begin::Table row-->
								<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
									<th>ID</th>
									<th>Partner Name</th>

									<th class="min-w-125px" colspan="3">Organization</th>
									<th class="min-w-125px">Created Date</th>
									<th class="text-end min-w-70px">Actions</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="fw-semibold text-gray-600">

								@foreach($partners as $partner)
								<tr>
									<td>{{$partner->id}}</td>
									<td>
										<a href="javascript:void(0)" class="text-gray-800 text-hover-primary mb-1 edit-org" data-details="{{$partner}}">{{$partner->partners_name}}</a>
									</td>

									<td colspan="3">
										@foreach($partner->organisations as $org)
										@if(auth()->user()->roles==1)
										<span class="badge badge-secondary">{{$org->org_name}}</span>
										@else
										@if($org->id==auth()->user()->company)
										<span class="badge badge-secondary">{{$org->org_name}}</span>
										@endif
										@endif
										@endforeach
									</td>
									<td>{{$partner->created_at}}</td>

									<td class="text-end">
										<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
											<span class="svg-icon svg-icon-5 m-0">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
												</svg>
											</span>

											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">

												<div class="menu-item px-3">
													<a href="javascript:void(0)" class="menu-link px-3 edit-org" data-details="{{$partner}}">Edit</a>
												</div>

												<div class="menu-item px-3">
													<a href="javascript:void(0)" class="menu-link px-3 delete-row" data-id="{{$partner->id}}">Delete</a>
												</div>
												@if(auth()->user()->roles>1)
												<div class="menu-item px-3">
													<a href="javascript:void(0)" class="menu-link px-3 active-partner {{($partner->org_p_status) ? 'text-success':'text-danger'}}" data-id="{{$partner->id}}" data-status={{$partner->org_p_status}}>{{($partner->org_p_status) ? 'Active':'Inactive'}}</a>
												</div>
												@else
												<div class="menu-item px-3">
													<a href="javascript:void(0)" class="menu-link px-3 active-partner {{($partner->status) ? 'text-success':'text-danger'}}" data-id="{{$partner->id}}" data-status={{$partner->status}}>{{($partner->status) ? 'Active':'Inactive'}}</a>
												</div>
												@endif
											</div>

									</td>

								</tr>
								@endforeach

							</tbody>
							<!--end::Table body-->
						</table>

					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
				<!--begin::Modals-->
				<!--begin::Modal - Customers - Add-->
				<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
					<!--begin::Modal dialog-->
					<div class="modal-dialog modal-dialog-centered mw-650px">
						<!--begin::Modal content-->
						<div class="modal-content">
							<!--begin::Form-->
							<form class="form" action="#" id="kt_modal_add_customer_form" data-kt-redirect="#">
								<!--begin::Modal header-->
								<div class="modal-header" id="kt_modal_add_customer_header">
									<!--begin::Modal title-->
									<h2 class="fw-bold">Add/Edit Partner</h2>
									<!--end::Modal title-->
									<!--begin::Close-->
									<div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
								<div class="modal-body py-10 px-lg-17">

									<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
										<input type="text" class="form-control form-control-solid" placeholder="" name="partnerid" id="orgid" value="0" style="display:none" />
										<div class="fv-row mb-7">

											<label class="required fs-6 fw-semibold mb-2">Name</label>

											<input type="text" class="form-control form-control-solid" placeholder="" name="name" id="name" value="" />

										</div>

										<div class="fv-row mb-7">

											<label class="fs-6 fw-semibold mb-2">
												<span class="required">Organizations</span>
												<!-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i> -->
											</label>

											<select class="form-control form-control-solid" id="organizations" name="organizations[]" multiple="multiple">
												<option value="">--Select Organization--</option>
												@foreach($orgs as $org)
												<option value="{{$org->id}}">{{$org->org_name}}</option>
												@endforeach
											</select>

										</div>

									</div>
									<!--end::Scroll-->
								</div>
								<!--end::Modal body-->
								<!--begin::Modal footer-->
								<div class="modal-footer flex-center">
									<!--begin::Button-->
									<button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
									<!--end::Button-->
									<!--begin::Button-->
									<button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
									<!--end::Button-->
								</div>
								<!--end::Modal footer-->
							</form>
							<!--end::Form-->
						</div>
					</div>
				</div>

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
		$('#organizations').select2();
		$(document).on('click', '.edit-org', function() {
			var userData = $(this).data('details');
			var UserRoles = '{{auth()->user()->roles}}';
			console.log(userData);

			var orgID = userData.org_id;
			if (UserRoles == 1) {
				orgID = orgID.split(',');
			}
			console.log(userData);
			$('#orgid').val(userData.id);
			$('#name').val(userData.partners_name);
			$('#organizations').val(orgID).trigger("change");
			$('#kt_modal_add_customer').modal('show');
		})

		$('.delete-row').click(function() {
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

					var userURL = "{{url('/').'/partner-delete'}}/" + data_id;
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

		$(document).on('click', '.active-partner', function() {
			var data_id = $(this).data('id');
			var user_status = $(this).data('status');
			var msg = '';

			if (user_status == 1) {
				msg = 'Are you sure you would like to inactive this partner?';


			} else {
				msg = 'Are you sure you would like to active this partner?'
			}
			Swal.fire({
				text: msg,
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, change it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function(result) {
				if (result.value) {

					var userURL = "{{url('/').'/partner-status-change'}}/" + data_id;
					$.get(userURL, function(data) {

						Swal.fire({
							text: data.message,
							icon: "success",
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