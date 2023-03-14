@php
$userDetails=auth()->user();
$permissions=App\Models\UserRolePermission::where('user_role_id',$userDetails->roles)->pluck('menu_id')->toArray();
//dd($permissions);
@endphp
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="{{route('dashboard')}}">
            <img alt="Logo" src="{{asset('assets/media/logos/logo-no-background.png')}}" class="h-25px app-sidebar-logo-default" />
            <img alt="Logo" src="{{asset('assets/media/logos/logo-no-background-icon.png')}}" class="h-20px app-sidebar-logo-minimize" />
        </a>
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
                </svg>
            </span>
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <!-- <div  class="menu-item menu-accordion @if(Route::current()->getName() === 'dashboard')
                here show @endif">
                <a class="menu-link @if(Route::current()->getName() === 'dashboard') active @endif" href="{{route('dashboard')}}">
                        <span class="menu-icon">
                          <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                </svg>
                            </span>  
                        </span>
                        <span class="menu-title">Dashboards</span>
                        </a>
                </div> -->
                <!--end:Menu item-->
                <!--begin:Menu item-->
                @if(in_array(12,$permissions) || in_array(11,$permissions) || in_array(10,$permissions))
                <div data-kt-menu-trigger="click" class="menu-item  menu-accordion @if((Route::current()->getName() === 'user') || (Route::current()->getName() === 'role') || (Route::current()->getName() === 'menu'))
                here show @endif">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z" fill="currentColor" />
                                    <path opacity="0.3" d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z" fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">User Management</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        @if(in_array(12,$permissions))
                        <div class="menu-item">
                            <a class="menu-link @if(Route::current()->getName() === 'user') active @endif" href="{{route('user')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Users</span>
                            </a>
                        </div>
                        @endif
                        @if(in_array(11,$permissions))
                        <div class="menu-item">
                            <a class="menu-link @if(Route::current()->getName() === 'role') active @endif" href="{{route('role')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Roles</span>
                            </a>
                        </div>
                        @endif
                        @if(in_array(10,$permissions))
                        <div class="menu-item">
                            <a class="menu-link @if(Route::current()->getName() === 'menu') active @endif" href="{{route('menu')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Permissions</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
                @if(in_array(14,$permissions) || in_array(16,$permissions))
                <div data-kt-menu-trigger="click" class="menu-item  menu-accordion @if(Route::current()->getName() === 'organization' || (Route::current()->getName() === 'partner'))
                here show @endif">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z" fill="currentColor" />
                                    <path opacity="0.3" d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z" fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Organization Management</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        @if(in_array(14,$permissions))
                        <div class="menu-item">
                            <a class="menu-link @if(Route::current()->getName() === 'organization' ) active @endif" href="{{route('organization')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Organization</span>
                            </a>
                        </div>
                        @endif
                        @if(in_array(16,$permissions))
                        <div class="menu-item">
                            <a class="menu-link @if(Route::current()->getName() === 'partner') active @endif" href="{{route('partner')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Partner</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
                @if(in_array(15,$permissions))
                <div data-kt-menu-trigger="click" class="menu-item  menu-accordion @if((Route::current()->getName() === 'feed-feed') || Route::current()->getName() === 'feed-log')
                here show @endif">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z" fill="currentColor" />
                                    <path opacity="0.3" d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z" fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Feed Management</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link @if(Route::current()->getName() === 'feed-feed') active @endif" href="{{route('feed-feed')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Feed</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if(Route::current()->getName() === 'feed-log') active @endif" href="{{route('feed-log')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Feed Log</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>