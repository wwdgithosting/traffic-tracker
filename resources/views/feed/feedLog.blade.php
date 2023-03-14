@extends('layout.app')
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Partners List</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Feed Logs</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">

                        </div>
                        <div class="card-toolbar">

                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <button type="button" class="btn btn-primary import-feed">Search</button>
                            </div>

                        </div>
                    </div>
                    <div class="card-body pt-0 table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 ">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>Pid</th>
                                    <th>Name</th>
                                    <th>Subid</th>
                                    <th>Browser</th>
                                    <th scope="col">Redirect</th>
                                    <th class="text-end min-w-70px">Organization</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach($logs as $log)
                                <tr>
                                    <td>{{$log->pid}}</td>
                                    <td><a href="javascript:void(0)" class="log-details" data-details="{{$log}}">{{$log->partner}}</a></td>
                                    <td>{{$log->subid}}</td>
                                    <td>{{$log->subid}}</td>
                                    <td>{{$log->url}}</td>
                                    <td>{{$log->organisation->org_name}}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    {!! $logs->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import feed from CSV</h5>
                <button type="button" class="close close-modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('feed-log')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Organisations:</label>
                        <select class="form-control form-control-solid org_name" name="org_name">
                            <option value="">---select---</option>
                            @foreach($organisations as $organisation)
                            <option value="{{$organisation->id}}" @if(auth()->user()->roles > 1) selected @endif>{{$organisation->org_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Partner:</label>
                        <select class="form-control form-control-solid partner_import" name="partner_import">
                            <option value="">---select---</option>

                            @if(auth()->user()->roles!=1)
                            @foreach($patners as $patner)
                            <option value="{{$patner->id}}">{{$patner->partners_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close close-modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="subid">Sub ID : </label>
                    <label id="subid"></label>
                </div>

                <div class="form-group">
                    <label for="ip">IP Address : </label>
                    <label id="ip"></label>
                </div>
                <div class="form-group">
                    <label for="country_iso">Country iso : </label>
                    <label id="country_iso"></label>

                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="keyword">Keyword : </label>
                    <label id="keyword"></label>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="device">Device : </label>
                    <label id="device"></label>

                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="os">OS : </label>
                    <label id="os"></label>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="os_version">Os version : </label>
                    <label id="os_version"></label>

                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="browser">Browser : </label>
                    <label id="browser"></label>

                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="browser_user_agent">Browser User Agent : </label>
                    <label id="browser_user_agent"></label>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="browser_language">Browser Language : </label>
                    <label id="browser_language"></label>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="count">Count : </label>
                    <label id="count"></label>

                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="fallback_feed_url_count">Fallback feed url count : </label>
                    <label id="fallback_feed_url_count"></label>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="referrer">Referrer : </label>
                    <label id="referrer"></label>

                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="url">Redirect : </label>
                    <label id="url"></label>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="latency">Latency : </label>
                    <label id="latency"></label>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal">Close</button>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.log-details', function() {
        var logDetails = $(this).data('details');
        $('#exampleModalLongTitle').html(logDetails.partner);
        $('#subid').html(logDetails.subid);
        $('#browser').html(logDetails.browser);
        $('#browser_language').html(logDetails.browser_language);
        $('#ip').html(logDetails.ip);
        $('#country_iso').html(logDetails.country_iso);
        $('#keyword').html(logDetails.keyword);
        $('#device').html(logDetails.device);
        $('#os').html(logDetails.os);
        $('#os_version').html(logDetails.os_version);
        $('#browser_user_agent').html(logDetails.browser_user_agent);
        $('#fallback_feed_url_count').html(logDetails.fallback_feed_url_count);
        $('#referrer').html(logDetails.referrer);
        $('#url').html(logDetails.url);
        $('#latency').html(logDetails.latency);


        $('#exampleModalLong').modal('show');

    })
    $(document).on('click', '.close-modal', function() {

        $('#exampleModalLong').modal('hide');

    })
    $('.import-feed').click(function() {
        $('#exampleModal').modal('show');
    })
    $('.close-modal').click(function() {
        $('#exampleModal').modal('hide');
    })
    $(document).on('change', '.org_name', function() {
        var id = $(this).val();
        $('.partner_import').html(' ');
        $.ajax({
            url: '{{url("/")."/get-partners"}}/' + id,
            type: 'GET',
            success: function(data) {
                console.log(data);
                for (var index = 0; index <= data.length; index++) {
                    $('.partner_import').append('<option value="' + data[index].id + '">' + data[index].partners_name + '</option>');
                }
            }
        })
    });
</script>
@push('scripts')
@endpush
@endsection