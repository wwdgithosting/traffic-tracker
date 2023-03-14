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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Organization List</h1>
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
						<li class="breadcrumb-item text-muted">Organization</li>
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
								<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers" />
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
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Organization</button>
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
									<th>Organization Name</th>

									<th>status</th>
									<th class="min-w-125px">Email</th>
									<th class="min-w-125px">Address</th>
									<th class="min-w-125px">Created Date</th>
									<th class="text-end min-w-70px">Actions</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="fw-semibold text-gray-600">

								@foreach($orgs as $org)
								<tr>
									<td>{{$org->id}}</td>
									<td>
										<a href="javascript:void(0)" class="text-gray-800 text-hover-primary mb-1">{{$org->org_name}}</a>
									</td>

									<td>{{($org->status==1) ? 'Active' : 'Inactive'}}</td>
									<td>
										<a href="#" class="text-gray-600 text-hover-primary mb-1">{{$org->email}}</a>
									</td>

									<td>{{$org->address}}</td>

									<td>{{$org->created_at}}</td>

									<td class="text-end">
										<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
											<span class="svg-icon svg-icon-5 m-0">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
												</svg>
											</span>

											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">

												<!-- <div class="menu-item px-3">
													<a href="javascript:void(0)" class="menu-link px-3">View</a>
												</div> -->

												<div class="menu-item px-3">
													<a href="javascript:void(0)" class="menu-link px-3 delete-row" data-id="{{$org->id}}">Delete</a>
												</div>

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
							<form class="form" action="#" id="kt_modal_add_customer_form" data-kt-redirect="../../demo1/dist/apps/customers/list.html">
								<!--begin::Modal header-->
								<div class="modal-header" id="kt_modal_add_customer_header">
									<!--begin::Modal title-->
									<h2 class="fw-bold">Add a Organization </h2>
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
									<!--begin::Scroll-->
									<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="required fs-6 fw-semibold mb-2">Name</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input type="text" class="form-control form-control-solid" placeholder="" name="name" value="" />
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="fs-6 fw-semibold mb-2">
												<span class="required">Email</span>
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
											</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input type="email" class="form-control form-control-solid" placeholder="" name="email" value="" />
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-15">
											<!--begin::Label-->
											<label class="fs-6 fw-semibold mb-2">Address</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input type="text" class="form-control form-control-solid" placeholder="" name="address" />
											<!--end::Input-->
										</div>
										<!--end::Input group-->

										<!--begin::Billing form-->

										<!--end::Billing form-->
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
				<!--end::Modal - Customers - Add-->
				<!--begin::Modal - Adjust Balance-->
				<div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
					<!--begin::Modal dialog-->
					<div class="modal-dialog modal-dialog-centered mw-650px">
						<!--begin::Modal content-->
						<div class="modal-content">
							<!--begin::Modal header-->
							<div class="modal-header">
								<!--begin::Modal title-->
								<h2 class="fw-bold">Export Customers</h2>
								<!--end::Modal title-->
								<!--begin::Close-->
								<div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
								<form id="kt_customers_export_form" class="form" action="#">
									<!--begin::Input group-->
									<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="fs-5 fw-semibold form-label mb-5">Select Export Format:</label>
										<!--end::Label-->
										<!--begin::Input-->
										<select data-control="select2" data-placeholder="Select a format" data-hide-search="true" name="format" class="form-select form-select-solid">
											<option value="excell">Excel</option>
											<option value="pdf">PDF</option>
											<option value="cvs">CVS</option>
											<option value="zip">ZIP</option>
										</select>
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="fs-5 fw-semibold form-label mb-5">Select Date Range:</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid" placeholder="Pick a date" name="date" />
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Row-->
									<div class="row fv-row mb-15">
										<!--begin::Label-->
										<label class="fs-5 fw-semibold form-label mb-5">Payment Type:</label>
										<!--end::Label-->
										<!--begin::Radio group-->
										<div class="d-flex flex-column">
											<!--begin::Radio button-->
											<label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
												<input class="form-check-input" type="checkbox" value="1" checked="checked" name="payment_type" />
												<span class="form-check-label text-gray-600 fw-semibold">All</span>
											</label>
											<!--end::Radio button-->
											<!--begin::Radio button-->
											<label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
												<input class="form-check-input" type="checkbox" value="2" checked="checked" name="payment_type" />
												<span class="form-check-label text-gray-600 fw-semibold">Visa</span>
											</label>
											<!--end::Radio button-->
											<!--begin::Radio button-->
											<label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
												<input class="form-check-input" type="checkbox" value="3" name="payment_type" />
												<span class="form-check-label text-gray-600 fw-semibold">Mastercard</span>
											</label>
											<!--end::Radio button-->
											<!--begin::Radio button-->
											<label class="form-check form-check-custom form-check-sm form-check-solid">
												<input class="form-check-input" type="checkbox" value="4" name="payment_type" />
												<span class="form-check-label text-gray-600 fw-semibold">American Express</span>
											</label>
											<!--end::Radio button-->
										</div>
										<!--end::Input group-->
									</div>
									<!--end::Row-->
									<!--begin::Actions-->
									<div class="text-center">
										<button type="reset" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
										<button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
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
<script>
	$(document).ready(function() {
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

					var userURL = "{{url('/').'/organization-delete'}}/" + data_id;
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