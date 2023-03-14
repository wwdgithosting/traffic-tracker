<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_feed_table">
    <!--begin::Table head-->
    <thead>
        <!--begin::Table row-->
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th>ID</th>
            <th>Feed Name</th>
            <th>Feed URL</th>
            <th>SubID</th>
            <th>status</th>
            <th class="min-w-125px">Limit</th>
            <th class="min-w-125px">IP</th>
            <th class="min-w-125px">Fall back URL</th>
            <th class="min-w-125px">Browser</th>
            <th class="min-w-125px">Create Date</th>
            <th class="text-end min-w-70px">Actions</th>
        </tr>
        <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="fw-semibold text-gray-600">

        @foreach($feeds as $feed)
        <tr>
            <td>{{$feed->id}}</td>
            <td>
                <a href="javascript:void(0)" class="text-gray-800 text-hover-primary mb-1">{{$feed->user->firstname.'_'.$feed->user->lastname}}</a>
            </td>
            <td>
                @php
                $feedUrl=json_decode($feed->feed_url, true);
                @endphp
                @foreach($feedUrl as $url)
                {{$url}}
                @endforeach
            </td>
            <td>
                <a href="javascript:void(0)" class="text-gray-800 text-hover-primary mb-1">SUB id</a>
            </td>
            <td>{{($feed->status==1) ? 'Active' : 'Inactive'}}</td>
            <td>
                <a href="#" class="text-gray-600 text-hover-primary mb-1">{{$feed->limit}}</a>
            </td>

            <td>{{$feed->ip}}</td>

            <td>{{$feed->fallback_feed_url}}</td>
            <td>{{$feed->browser}}</td>
            <td>{{$feed->created_at}}</td>

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
                            <a href="javascript:void(0)" class="menu-link px-3 delete-row" data-id="{{$feed->id}}">Delete</a>
                        </div>

                    </div>

            </td>

        </tr>
        @endforeach

    </tbody>
    <!--end::Table body-->
</table>
{!! $feeds->render() !!}