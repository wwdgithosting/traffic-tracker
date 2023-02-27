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
				<div class="d-flex align-items-center gap-2 gap-lg-3">
					<!--begin::Filter menu-->
					<div class="m-0">
						<!--begin::Menu toggle-->
						<a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
							<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
							<span class="svg-icon svg-icon-6 svg-icon-muted me-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->Filter</a>
						<!--end::Menu toggle-->
						<!--begin::Menu 1-->
						<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_63de8ad9d5bf8">
							<!--begin::Header-->
							<div class="px-7 py-5">
								<div class="fs-5 text-dark fw-bold">Filter Options</div>
							</div>
							<!--end::Header-->
							<!--begin::Menu separator-->
							<div class="separator border-gray-200"></div>
							<!--end::Menu separator-->
							<!--begin::Form-->
							<div class="px-7 py-5">
								<!--begin::Input group-->
								<div class="mb-10">
									<!--begin::Label-->
									<label class="form-label fw-semibold">Status:</label>
									<!--end::Label-->
									<!--begin::Input-->
									<div>
										<select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_63de8ad9d5bf8" data-allow-clear="true">
											<option></option>
											<option value="1">Approved</option>
											<option value="2">Pending</option>
											<option value="2">In Process</option>
											<option value="2">Rejected</option>
										</select>
									</div>
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10">
									<!--begin::Label-->
									<label class="form-label fw-semibold">Member Type:</label>
									<!--end::Label-->
									<!--begin::Options-->
									<div class="d-flex">
										<!--begin::Options-->
										<label class="form-check form-check-sm form-check-custom form-check-solid me-5">
											<input class="form-check-input" type="checkbox" value="1" />
											<span class="form-check-label">Author</span>
										</label>
										<!--end::Options-->
										<!--begin::Options-->
										<label class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="2" checked="checked" />
											<span class="form-check-label">Customer</span>
										</label>
										<!--end::Options-->
									</div>
									<!--end::Options-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10">
									<!--begin::Label-->
									<label class="form-label fw-semibold">Notifications:</label>
									<!--end::Label-->
									<!--begin::Switch-->
									<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
										<input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
										<label class="form-check-label">Enabled</label>
									</div>
									<!--end::Switch-->
								</div>
								<!--end::Input group-->
								<!--begin::Actions-->
								<div class="d-flex justify-content-end">
									<button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
									<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Form-->
						</div>
						<!--end::Menu 1-->
					</div>
					<!--end::Filter menu-->
					<!--begin::Secondary button-->
					<!--end::Secondary button-->
					<!--begin::Primary button-->
					<a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
					<!--end::Primary button-->
				</div>
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
								<tr>
									<!--begin::Name=-->
									<td>User Management</td>
									<!--end::Name=-->
									<!--begin::Assigned to=-->
									<td>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-primary fs-7 m-1">Administrator</a>
									</td>
									<!--end::Assigned to=-->
									<!--begin::Created Date-->
									<td>10 Mar 2023, 10:10 pm</td>
									<!--end::Created Date-->
									<!--begin::Action=-->
									<td class="text-end">
										<!--begin::Update-->
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
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
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
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
								<tr>
									<!--begin::Name=-->
									<td>Content Management</td>
									<!--end::Name=-->
									<!--begin::Assigned to=-->
									<td>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-primary fs-7 m-1">Administrator</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-danger fs-7 m-1">Developer</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-success fs-7 m-1">Analyst</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-info fs-7 m-1">Support</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-warning fs-7 m-1">Trial</a>
									</td>
									<!--end::Assigned to=-->
									<!--begin::Created Date-->
									<td>05 May 2023, 10:10 pm</td>
									<!--end::Created Date-->
									<!--begin::Action=-->
									<td class="text-end">
										<!--begin::Update-->
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
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
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
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
								<tr>
									<!--begin::Name=-->
									<td>Financial Management</td>
									<!--end::Name=-->
									<!--begin::Assigned to=-->
									<td>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-primary fs-7 m-1">Administrator</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-success fs-7 m-1">Analyst</a>
									</td>
									<!--end::Assigned to=-->
									<!--begin::Created Date-->
									<td>05 May 2023, 6:43 am</td>
									<!--end::Created Date-->
									<!--begin::Action=-->
									<td class="text-end">
										<!--begin::Update-->
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
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
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
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
								<tr>
									<!--begin::Name=-->
									<td>Reporting</td>
									<!--end::Name=-->
									<!--begin::Assigned to=-->
									<td>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-primary fs-7 m-1">Administrator</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-success fs-7 m-1">Analyst</a>
									</td>
									<!--end::Assigned to=-->
									<!--begin::Created Date-->
									<td>19 Aug 2023, 10:30 am</td>
									<!--end::Created Date-->
									<!--begin::Action=-->
									<td class="text-end">
										<!--begin::Update-->
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
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
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
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
								<tr>
									<!--begin::Name=-->
									<td>Payroll</td>
									<!--end::Name=-->
									<!--begin::Assigned to=-->
									<td>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-primary fs-7 m-1">Administrator</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-success fs-7 m-1">Analyst</a>
									</td>
									<!--end::Assigned to=-->
									<!--begin::Created Date-->
									<td>20 Dec 2023, 8:43 pm</td>
									<!--end::Created Date-->
									<!--begin::Action=-->
									<td class="text-end">
										<!--begin::Update-->
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
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
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
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
								<tr>
									<!--begin::Name=-->
									<td>Disputes Management</td>
									<!--end::Name=-->
									<!--begin::Assigned to=-->
									<td>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-primary fs-7 m-1">Administrator</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-danger fs-7 m-1">Developer</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-info fs-7 m-1">Support</a>
									</td>
									<!--end::Assigned to=-->
									<!--begin::Created Date-->
									<td>10 Mar 2023, 9:23 pm</td>
									<!--end::Created Date-->
									<!--begin::Action=-->
									<td class="text-end">
										<!--begin::Update-->
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
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
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
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
								<tr>
									<!--begin::Name=-->
									<td>API Controls</td>
									<!--end::Name=-->
									<!--begin::Assigned to=-->
									<td>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-primary fs-7 m-1">Administrator</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-danger fs-7 m-1">Developer</a>
									</td>
									<!--end::Assigned to=-->
									<!--begin::Created Date-->
									<td>19 Aug 2023, 8:43 pm</td>
									<!--end::Created Date-->
									<!--begin::Action=-->
									<td class="text-end">
										<!--begin::Update-->
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
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
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
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
								<tr>
									<!--begin::Name=-->
									<td>Database Management</td>
									<!--end::Name=-->
									<!--begin::Assigned to=-->
									<td>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-primary fs-7 m-1">Administrator</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-danger fs-7 m-1">Developer</a>
									</td>
									<!--end::Assigned to=-->
									<!--begin::Created Date-->
									<td>05 May 2023, 6:43 am</td>
									<!--end::Created Date-->
									<!--begin::Action=-->
									<td class="text-end">
										<!--begin::Update-->
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
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
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
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
								<tr>
									<!--begin::Name=-->
									<td>Repository Management</td>
									<!--end::Name=-->
									<!--begin::Assigned to=-->
									<td>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-primary fs-7 m-1">Administrator</a>
										<a href="../../demo1/dist/apps/user-management/roles/view.html" class="badge badge-light-danger fs-7 m-1">Developer</a>
									</td>
									<!--end::Assigned to=-->
									<!--begin::Created Date-->
									<td>10 Mar 2023, 6:43 am</td>
									<!--end::Created Date-->
									<!--begin::Action=-->
									<td class="text-end">
										<!--begin::Update-->
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
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
										<button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
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
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Checkbox-->
										<label class="form-check form-check-custom form-check-solid me-9">
											<input class="form-check-input" type="checkbox" value="" name="permissions_core" id="kt_permissions_core" />
											<span class="form-check-label" for="kt_permissions_core">Set as core permission</span>
										</label>
										<!--end::Checkbox-->
									</div>
									<!--end::Input group-->
									<!--begin::Disclaimer-->
									<div class="text-gray-600">Permission set as a
										<strong class="me-1">Core Permission</strong>will be locked and
										<strong class="me-1">not editable</strong>in future
									</div>
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
										<input class="form-control form-control-solid" placeholder="Enter a permission name" name="permission_name" />
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
@push('scripts')
<!-- <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/list.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/add-permission.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/user-management/permissions/update-permission.js')}}"></script> -->
@endpush

@endsection