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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Feeds</h1>
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
						<li class="breadcrumb-item text-muted">Feed</li>
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
								<input type="text" data-kt-feed-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Feed" />
							</div>
							<!--end::Search-->
						</div>
						<!--begin::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<!--begin::Toolbar-->
							<div class="d-flex justify-content-end" data-kt-feed-table-toolbar="base">


								<!--end::Export-->
								<!--begin::Add customer-->
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_feeds">Add Feed</button>
								<!--end::Add customer-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Group actions-->
							<div class="d-flex justify-content-end align-items-center d-none" data-kt-feed-table-toolbar="selected">
								<div class="fw-bold me-5">
									<span class="me-2" data-kt-feed-table-select="selected_count"></span>Selected
								</div>
								<button type="button" class="btn btn-danger" data-kt-feed-table-select="delete_selected">Delete Selected</button>
							</div>
							<!--end::Group actions-->
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0" id="item-lists">
						<!--begin::Table-->
						@include('feed.table')

					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
				<!--begin::Modals-->
				<!--begin::Modal - Customers - Add-->
				<div class="modal fade" id="kt_modal_add_feeds" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered mw-650px">
						<div class="modal-content">
							<form class="form" action="#" id="kt_modal_add_feeds_form" data-kt-redirect="#">
								<div class="modal-header" id="kt_modal_add_feeds_header">
									<h2 class="fw-bold">Add New Feed</h2>
									<div id="kt_modal_add_feeds_close" class="btn btn-icon btn-sm btn-active-icon-primary">
										<span class="svg-icon svg-icon-1">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
												<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
											</svg>
										</span>
									</div>
								</div>
								<div class="modal-body py-10 px-lg-17">
									<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
										<div class="fv-row mb-7">
											<label class="required fs-6 fw-semibold mb-2">Name</label>
											<select class="form-control form-control-solid" name="feedname">
												<option value="">---select---</option>
												@foreach($users as $user)
												<option value="{{$user->id}}">{{$user->firstname.' '.$user->lastname}}</option>
												@endforeach
											</select>
											<!-- <input type="text" class="form-control form-control-solid" placeholder="" name="feedname" value="" /> -->
										</div>
										<div class="fv-row mb-7">
											<label class="required fs-6 fw-semibold mb-2">No of URL</label>
											<input type="text" class="form-control form-control-solid" placeholder="" name="limit" value="" />
										</div>
										<div class="fv-row mb-15">
											<label class="fs-6 fw-semibold mb-2">Notes</label>
											<input type="text" class="form-control form-control-solid" placeholder="" name="description" />
										</div>
										<div class="fw-bold fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_add_customer_billing_info" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Feed URL Lists
											<span class="ms-2 rotate-180">
												<span class="svg-icon svg-icon-3">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
													</svg>
												</span>
											</span>
										</div>
										<div id="kt_modal_add_customer_billing_info" class="collapse show">

											<div class="d-flex flex-column mb-7 fv-row repeter-row">

												<div class="row g-9 mb-7" id="row-0">
													<div class="col-md-6 fv-row">
														<label class="required fs-6 fw-semibold mb-2">Feed URL</label>
														<input class="form-control form-control-solid feed_url" placeholder="" name="feed_url[]" value="" />
													</div>
													<div class="col-md-2 fv-row">
														<label class="required fs-6 fw-semibold mb-2">Limit</label>
														<input class="form-control form-control-solid feed_url_limit" placeholder="" name="feed_url_limit[]" value="" />
													</div>
													<div class="col-md-2 fv-row">
														<label class="required fs-6 fw-semibold mb-2">Sub ID</label>
														<input class="form-control form-control-solid sub_id" placeholder="" name="sub_id[]" value="" />
													</div>
													<div class="col-md-2 fv-row">
														<a href="javascript:void(0)" class="del-row" data-index="0"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
													</div>
												</div>

											</div>
											<div class="d-flex flex-column mb-7 fv-row">
												<button class="btn btn-primary add-row" type="button">Add Row</button>
											</div>
											<div class="d-flex flex-column mb-7 fv-row">
												<label class="fs-6 fw-semibold mb-2">
													<span class="required">Fallback feed url</span>
													<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Fallback feed url"></i>
												</label>
												<input class="form-control form-control-solid" placeholder="" name="fallback_feed_url" value="" />
											</div>
											<div class="fv-row mb-7">
												<div class="d-flex flex-stack">
													<div class="me-5">
														<label class="fs-6 fw-semibold">IP limits should be enabled</label>
														<!-- <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div> -->
													</div>
													<label class="form-check form-switch form-check-custom form-check-solid">
														<input class="form-check-input" name="ip_limit" type="checkbox" id="kt_modal_ip_limit" />
														<span class="form-check-label fw-semibold text-muted" for="kt_modal_ip_limit">Yes</span>
													</label>
												</div>
											</div>
											<div class="fv-row mb-7">
												<div class="d-flex flex-stack">
													<div class="me-5">
														<label class="fs-6 fw-semibold">Individual sub id limits on top along with the overall limit</label>

													</div>
													<label class="form-check form-switch form-check-custom form-check-solid">
														<input class="form-check-input" name="sid_limit" type="checkbox" id="kt_modal_sub_id_limit" />
														<span class="form-check-label fw-semibold text-muted" for="kt_modal_sub_id_limit">Yes</span>
													</label>
												</div>
											</div>
											<div class="fv-row mb-7">
												<div class="d-flex flex-stack">
													<div class="me-5">
														<label class="fs-6 fw-semibold">Enable feed url randomisation</label>

													</div>
													<label class="form-check form-switch form-check-custom form-check-solid">
														<input class="form-check-input" name="randomise" type="checkbox" id="kt_modal_randonisation" />
														<span class="form-check-label fw-semibold text-muted" for="kt_modal_randonisation">Yes</span>
													</label>
												</div>
											</div>
											<div class="fv-row mb-7">
												<div class="d-flex flex-stack">
													<div class="me-5">
														<label class="fs-6 fw-semibold">Enable latency testing</label>

													</div>
													<label class="form-check form-switch form-check-custom form-check-solid">
														<input class="form-check-input" name="latency_test" type="checkbox" id="kt_modal_latency_test" />
														<span class="form-check-label fw-semibold text-muted" for="kt_modal_latency_test">Yes</span>
													</label>
												</div>
											</div>
											<div class="fv-row mb-7">
												<div class="d-flex flex-stack">
													<div class="me-5">
														<label class="fs-6 fw-semibold">Feed URL Waterfall</label>

													</div>
													<label class="form-check form-switch form-check-custom form-check-solid">
														<input class="form-check-input" name="feed_url_waterfall" type="checkbox" id="kt_modal_feed_url_waterfall" />
														<span class="form-check-label fw-semibold text-muted" for="kt_modal_feed_url_waterfall">Yes</span>
													</label>
												</div>
											</div>
										</div>
									</div>

								</div>

								<div class="modal-footer flex-center">

									<button type="reset" id="kt_modal_add_feeds_cancel" class="btn btn-light me-3">Discard</button>

									<button type="submit" id="kt_modal_add_feeds_submit" class="btn btn-primary">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>

								</div>

							</form>

						</div>
					</div>
				</div>
				<!--end::Modal - Customers - Add-->
				<!--begin::Modal - Adjust Balance-->

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
	$(window).on('hashchange', function() {
		if (window.location.hash) {
			var page = window.location.hash.replace('#', '');
			if (page == Number.NaN || page <= 0) {
				return false;
			} else {
				getData(page);
			}
		}
	});


	$(document).ready(function() {
		$(document).on('click', '.pagination a', function(event) {
			$('li').removeClass('active');
			$(this).parent('li').addClass('active');
			event.preventDefault();


			var myurl = $(this).attr('href');
			var page = $(this).attr('href').split('page=')[1];


			getData(page);
		});
	});


	function getData(page) {
		$.ajax({
				url: '?page=' + page,
				type: "get",
				datatype: "html",
			})
			.done(function(data) {
				$("#item-lists").empty().html(data);
				location.hash = page;
			})
			.fail(function(jqXHR, ajaxOptions, thrownError) {
				alert('No response from server');
			});
	}

	$(document).ready(function() {
		var i = 1;
		$(document).on('click', '.add-row', function() {
			var html = '<div class="row g-9 mb-7" id="row-' + i + '"><div class="col-md-6 fv-row"> <label class="required fs-6 fw-semibold mb-2">Feed URL</label> <input class="form-control form-control-solid feed_url" placeholder="" name="feed_url[]" value="" /> </div> <div class="col-md-2 fv-row"> <label class="required fs-6 fw-semibold mb-2">Limit</label> <input class="form-control form-control-solid feed_url_limit" placeholder="" name="feed_url_limit[]" value="" /> </div><div class="col-md-2 fv-row"> <label class="required fs-6 fw-semibold mb-2">Sub ID</label> <input class="form-control form-control-solid sub_id" placeholder="" name="sub_id[]" value="" /> </div> <div class="col-md-2 fv-row"> <a href="javascript:void(0)" class="del-row" data-index="' + i + '"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a> </div></div>';
			$('.repeter-row').append(html)
			i++;
		});

		$(document).on('click', '.del-row', function() {
			let index = $(this).data('index');
			$('#row-' + index).remove();
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