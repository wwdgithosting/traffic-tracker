<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.1.7
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
   <base href="javascript:void(0)" />
   <title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
   <meta charset="utf-8" />
   <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
   <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="csrf-token" content="{{csrf_token()}}">
   <meta property="og:locale" content="en_US" />
   <meta property="og:type" content="article" />
   <meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
   <meta property="og:url" content="https://keenthemes.com/metronic" />
   <meta property="og:site_name" content="Keenthemes | Metronic" />
   <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
   <link rel="shortcut icon" href="{{asset('assets/media/logos/logo-no-background.png')}}" />
   <!--begin::Fonts(mandatory for all pages)-->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
   <!--end::Fonts-->
   <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
   <!--begin::Theme mode setup on page load-->
   <script>
      var defaultThemeMode = "light";
      var themeMode;
      if (document.documentElement) {
         if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
         } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
               themeMode = localStorage.getItem("data-bs-theme");
            } else {
               themeMode = defaultThemeMode;
            }
         }
         if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
         }
         document.documentElement.setAttribute("data-bs-theme", themeMode);
      }
   </script>
   <!--end::Theme mode setup on page load-->
   <!--begin::App-->
   <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
      <!--begin::Page-->
      <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
         <!--begin::Header-->

         @include('layout.header')
         <!--end::Header-->
         <!--begin::Wrapper-->
         <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <!--begin::Sidebar-->
            @include('layout.sidebar')

            <!--end::Sidebar-->
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
               <!--begin::Content wrapper-->
               @yield('content')
               <!--end::Content wrapper-->
               <!--begin::Footer-->
               <div id="kt_app_footer" class="app-footer">
                  <!--begin::Footer container-->
                  <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                     <!--begin::Copyright-->
                     <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-semibold me-1">{{date('Y')}}&copy;</span>
                        <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
                     </div>
                     <!--end::Copyright-->
                     <!--begin::Menu-->
                     <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item">
                           <a href="#" target="_blank" class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item">
                           <a href="#" target="_blank" class="menu-link px-2">Support</a>
                        </li>
                        <li class="menu-item">
                           <a href="#" target="_blank" class="menu-link px-2">Purchase</a>
                        </li>
                     </ul>
                     <!--end::Menu-->
                  </div>
                  <!--end::Footer container-->
               </div>
               <!--end::Footer-->
            </div>
            <!--end:::Main-->
         </div>
         <!--end::Wrapper-->
      </div>
      <!--end::Page-->
   </div>
   <!--end::App-->
   <!--begin::Drawers-->
   <!--begin::Activities drawer-->

   <!--end::Activities drawer-->
   <!--begin::Chat drawer-->
   <div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
      <!--begin::Messenger-->
      <div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
         <!--begin::Card header-->
         <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
            <!--begin::Title-->
            <div class="card-title">
               <!--begin::User-->
               <div class="d-flex justify-content-center flex-column me-3">
                  <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian Cox</a>
                  <!--begin::Info-->
                  <div class="mb-0 lh-1">
                     <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                     <span class="fs-7 fw-semibold text-muted">Active</span>
                  </div>
                  <!--end::Info-->
               </div>
               <!--end::User-->
            </div>
            <!--end::Title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
               <!--begin::Menu-->
               <div class="me-2">
                  <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                     <i class="bi bi-three-dots fs-3"></i>
                  </button>
                  <!--begin::Menu 3-->
                  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                     <!--begin::Heading-->
                     <div class="menu-item px-3">
                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
                     </div>
                     <!--end::Heading-->
                     <!--begin::Menu item-->
                     <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add Contact</a>
                     </div>
                     <!--end::Menu item-->
                     <!--begin::Menu item-->
                     <div class="menu-item px-3">
                        <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Invite Contacts
                           <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a contact email to send an invitation"></i></a>
                     </div>
                     <!--end::Menu item-->
                     <!--begin::Menu item-->
                     <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                        <a href="#" class="menu-link px-3">
                           <span class="menu-title">Groups</span>
                           <span class="menu-arrow"></span>
                        </a>
                        <!--begin::Menu sub-->
                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                           <!--begin::Menu item-->
                           <div class="menu-item px-3">
                              <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Create Group</a>
                           </div>
                           <!--end::Menu item-->
                           <!--begin::Menu item-->
                           <div class="menu-item px-3">
                              <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Invite Members</a>
                           </div>
                           <!--end::Menu item-->
                           <!--begin::Menu item-->
                           <div class="menu-item px-3">
                              <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Settings</a>
                           </div>
                           <!--end::Menu item-->
                        </div>
                        <!--end::Menu sub-->
                     </div>
                     <!--end::Menu item-->
                     <!--begin::Menu item-->
                     <div class="menu-item px-3 my-1">
                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Settings</a>
                     </div>
                     <!--end::Menu item-->
                  </div>
                  <!--end::Menu 3-->
               </div>
               <!--end::Menu-->
               <!--begin::Close-->
               <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                  <span class="svg-icon svg-icon-2">
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                     </svg>
                  </span>
                  <!--end::Svg Icon-->
               </div>
               <!--end::Close-->
            </div>
            <!--end::Card toolbar-->
         </div>
         <!--end::Card header-->
         <!--begin::Card body-->
         <div class="card-body" id="kt_drawer_chat_messenger_body">
            <!--begin::Messages-->
            <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer" data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
               <!--begin::Message(in)-->
               <div class="d-flex justify-content-start mb-10">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column align-items-start">
                     <!--begin::User-->
                     <div class="d-flex align-items-center mb-2">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-35px symbol-circle">
                           <img alt="Pic" src="{{asset('assets/media/avatars/300-25.jpg')}}" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Details-->
                        <div class="ms-3">
                           <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                           <span class="text-muted fs-7 mb-1">2 mins</span>
                        </div>
                        <!--end::Details-->
                     </div>
                     <!--end::User-->
                     <!--begin::Text-->
                     <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">How likely are you to recommend our company to your friends and family ?</div>
                     <!--end::Text-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Message(in)-->
               <!--begin::Message(out)-->
               <div class="d-flex justify-content-end mb-10">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column align-items-end">
                     <!--begin::User-->
                     <div class="d-flex align-items-center mb-2">
                        <!--begin::Details-->
                        <div class="me-3">
                           <span class="text-muted fs-7 mb-1">5 mins</span>
                           <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                        </div>
                        <!--end::Details-->
                        <!--begin::Avatar-->
                        <div class="symbol symbol-35px symbol-circle">
                           <img alt="Pic" src="{{asset('assets/media/avatars/300-1.jpg')}}" />
                        </div>
                        <!--end::Avatar-->
                     </div>
                     <!--end::User-->
                     <!--begin::Text-->
                     <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">Hey there, we’re just writing to let you know that you’ve been subscribed to a repository on GitHub.</div>
                     <!--end::Text-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Message(out)-->
               <!--begin::Message(in)-->
               <div class="d-flex justify-content-start mb-10">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column align-items-start">
                     <!--begin::User-->
                     <div class="d-flex align-items-center mb-2">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-35px symbol-circle">
                           <img alt="Pic" src="{{asset('assets/media/avatars/300-25.jpg')}}" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Details-->
                        <div class="ms-3">
                           <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                           <span class="text-muted fs-7 mb-1">1 Hour</span>
                        </div>
                        <!--end::Details-->
                     </div>
                     <!--end::User-->
                     <!--begin::Text-->
                     <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">Ok, Understood!</div>
                     <!--end::Text-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Message(in)-->
               <!--begin::Message(out)-->
               <div class="d-flex justify-content-end mb-10">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column align-items-end">
                     <!--begin::User-->
                     <div class="d-flex align-items-center mb-2">
                        <!--begin::Details-->
                        <div class="me-3">
                           <span class="text-muted fs-7 mb-1">2 Hours</span>
                           <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                        </div>
                        <!--end::Details-->
                        <!--begin::Avatar-->
                        <div class="symbol symbol-35px symbol-circle">
                           <img alt="Pic" src="{{asset('assets/media/avatars/300-1.jpg')}}" />
                        </div>
                        <!--end::Avatar-->
                     </div>
                     <!--end::User-->
                     <!--begin::Text-->
                     <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">You’ll receive notifications for all issues, pull requests!</div>
                     <!--end::Text-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Message(out)-->
               <!--begin::Message(in)-->
               <div class="d-flex justify-content-start mb-10">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column align-items-start">
                     <!--begin::User-->
                     <div class="d-flex align-items-center mb-2">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-35px symbol-circle">
                           <img alt="Pic" src="{{asset('assets/media/avatars/300-25.jpg')}}" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Details-->
                        <div class="ms-3">
                           <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                           <span class="text-muted fs-7 mb-1">3 Hours</span>
                        </div>
                        <!--end::Details-->
                     </div>
                     <!--end::User-->
                     <!--begin::Text-->
                     <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">You can unwatch this repository immediately by clicking here:
                        <a href="#">Keenthemes.com</a>
                     </div>
                     <!--end::Text-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Message(in)-->
               <!--begin::Message(out)-->
               <div class="d-flex justify-content-end mb-10">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column align-items-end">
                     <!--begin::User-->
                     <div class="d-flex align-items-center mb-2">
                        <!--begin::Details-->
                        <div class="me-3">
                           <span class="text-muted fs-7 mb-1">4 Hours</span>
                           <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                        </div>
                        <!--end::Details-->
                        <!--begin::Avatar-->
                        <div class="symbol symbol-35px symbol-circle">
                           <img alt="Pic" src="{{asset('assets/media/avatars/300-1.jpg')}}" />
                        </div>
                        <!--end::Avatar-->
                     </div>
                     <!--end::User-->
                     <!--begin::Text-->
                     <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">Most purchased Business courses during this sale!</div>
                     <!--end::Text-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Message(out)-->
               <!--begin::Message(in)-->
               <div class="d-flex justify-content-start mb-10">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column align-items-start">
                     <!--begin::User-->
                     <div class="d-flex align-items-center mb-2">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-35px symbol-circle">
                           <img alt="Pic" src="{{asset('assets/media/avatars/300-25.jpg')}}" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Details-->
                        <div class="ms-3">
                           <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                           <span class="text-muted fs-7 mb-1">5 Hours</span>
                        </div>
                        <!--end::Details-->
                     </div>
                     <!--end::User-->
                     <!--begin::Text-->
                     <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">Company BBQ to celebrate the last quater achievements and goals. Food and drinks provided</div>
                     <!--end::Text-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Message(in)-->
               <!--begin::Message(template for out)-->
               <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column align-items-end">
                     <!--begin::User-->
                     <div class="d-flex align-items-center mb-2">
                        <!--begin::Details-->
                        <div class="me-3">
                           <span class="text-muted fs-7 mb-1">Just now</span>
                           <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                        </div>
                        <!--end::Details-->
                        <!--begin::Avatar-->
                        <div class="symbol symbol-35px symbol-circle">
                           <img alt="Pic" src="{{asset('assets/media/avatars/300-1.jpg')}}" />
                        </div>
                        <!--end::Avatar-->
                     </div>
                     <!--end::User-->
                     <!--begin::Text-->
                     <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text"></div>
                     <!--end::Text-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Message(template for out)-->
               <!--begin::Message(template for in)-->
               <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column align-items-start">
                     <!--begin::User-->
                     <div class="d-flex align-items-center mb-2">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-35px symbol-circle">
                           <img alt="Pic" src="{{asset('assets/media/avatars/300-25.jpg')}}" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Details-->
                        <div class="ms-3">
                           <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                           <span class="text-muted fs-7 mb-1">Just now</span>
                        </div>
                        <!--end::Details-->
                     </div>
                     <!--end::User-->
                     <!--begin::Text-->
                     <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">Right before vacation season we have the next Big Deal for you.</div>
                     <!--end::Text-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Message(template for in)-->
            </div>
            <!--end::Messages-->
         </div>
         <!--end::Card body-->
         <!--begin::Card footer-->
         <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
            <!--begin::Input-->
            <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
            <!--end::Input-->
            <!--begin:Toolbar-->
            <div class="d-flex flex-stack">
               <!--begin::Actions-->
               <div class="d-flex align-items-center me-2">
                  <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
                     <i class="bi bi-paperclip fs-3"></i>
                  </button>
                  <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
                     <i class="bi bi-upload fs-3"></i>
                  </button>
               </div>
               <!--end::Actions-->
               <!--begin::Send-->
               <button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
               <!--end::Send-->
            </div>
            <!--end::Toolbar-->
         </div>
         <!--end::Card footer-->
      </div>
      <!--end::Messenger-->
   </div>
   <!--end::Chat drawer-->
   <!--begin::Chat drawer-->
   <div id="kt_shopping_cart" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="cart" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_shopping_cart_toggle" data-kt-drawer-close="#kt_drawer_shopping_cart_close">
      <!--begin::Messenger-->
      <div class="card card-flush w-100 rounded-0">
         <!--begin::Card header-->
         <div class="card-header">
            <!--begin::Title-->
            <h3 class="card-title text-gray-900 fw-bold">Shopping Cart</h3>
            <!--end::Title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
               <!--begin::Close-->
               <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_shopping_cart_close">
                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                  <span class="svg-icon svg-icon-2">
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                     </svg>
                  </span>
                  <!--end::Svg Icon-->
               </div>
               <!--end::Close-->
            </div>
            <!--end::Card toolbar-->
         </div>
         <!--end::Card header-->
         <!--begin::Card body-->
         <div class="card-body hover-scroll-overlay-y h-400px pt-5">
            <!--begin::Item-->
            <div class="d-flex flex-stack">
               <!--begin::Wrapper-->
               <div class="d-flex flex-column me-3">
                  <!--begin::Section-->
                  <div class="mb-3">
                     <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">Iblender</a>
                     <span class="text-gray-400 fw-semibold d-block">The best kitchen gadget in 2022</span>
                  </div>
                  <!--end::Section-->
                  <!--begin::Section-->
                  <div class="d-flex align-items-center">
                     <span class="fw-bold text-gray-800 fs-5">$ 350</span>
                     <span class="text-muted mx-2">for</span>
                     <span class="fw-bold text-gray-800 fs-5 me-3">5</span>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Wrapper-->
               <!--begin::Pic-->
               <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                  <img src="{{asset('assets/media/stock/600x400/img-1.jpg')}}" alt="" />
               </div>
               <!--end::Pic-->
            </div>
            <!--end::Item-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->
            <!--begin::Item-->
            <div class="d-flex flex-stack">
               <!--begin::Wrapper-->
               <div class="d-flex flex-column me-3">
                  <!--begin::Section-->
                  <div class="mb-3">
                     <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">SmartCleaner</a>
                     <span class="text-gray-400 fw-semibold d-block">Smart tool for cooking</span>
                  </div>
                  <!--end::Section-->
                  <!--begin::Section-->
                  <div class="d-flex align-items-center">
                     <span class="fw-bold text-gray-800 fs-5">$ 650</span>
                     <span class="text-muted mx-2">for</span>
                     <span class="fw-bold text-gray-800 fs-5 me-3">4</span>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Wrapper-->
               <!--begin::Pic-->
               <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                  <img src="{{asset('assets/media/stock/600x400/img-3.jpg')}}" alt="" />
               </div>
               <!--end::Pic-->
            </div>
            <!--end::Item-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->
            <!--begin::Item-->
            <div class="d-flex flex-stack">
               <!--begin::Wrapper-->
               <div class="d-flex flex-column me-3">
                  <!--begin::Section-->
                  <div class="mb-3">
                     <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">CameraMaxr</a>
                     <span class="text-gray-400 fw-semibold d-block">Professional camera for edge</span>
                  </div>
                  <!--end::Section-->
                  <!--begin::Section-->
                  <div class="d-flex align-items-center">
                     <span class="fw-bold text-gray-800 fs-5">$ 150</span>
                     <span class="text-muted mx-2">for</span>
                     <span class="fw-bold text-gray-800 fs-5 me-3">3</span>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Wrapper-->
               <!--begin::Pic-->
               <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                  <img src="{{asset('assets/media/stock/600x400/img-8.jpg')}}" alt="" />
               </div>
               <!--end::Pic-->
            </div>
            <!--end::Item-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->
            <!--begin::Item-->
            <div class="d-flex flex-stack">
               <!--begin::Wrapper-->
               <div class="d-flex flex-column me-3">
                  <!--begin::Section-->
                  <div class="mb-3">
                     <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">$D Printer</a>
                     <span class="text-gray-400 fw-semibold d-block">Manfactoring unique objekts</span>
                  </div>
                  <!--end::Section-->
                  <!--begin::Section-->
                  <div class="d-flex align-items-center">
                     <span class="fw-bold text-gray-800 fs-5">$ 1450</span>
                     <span class="text-muted mx-2">for</span>
                     <span class="fw-bold text-gray-800 fs-5 me-3">7</span>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Wrapper-->
               <!--begin::Pic-->
               <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                  <img src="{{asset('assets/media/stock/600x400/img-26.jpg')}}" alt="" />
               </div>
               <!--end::Pic-->
            </div>
            <!--end::Item-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->
            <!--begin::Item-->
            <div class="d-flex flex-stack">
               <!--begin::Wrapper-->
               <div class="d-flex flex-column me-3">
                  <!--begin::Section-->
                  <div class="mb-3">
                     <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">MotionWire</a>
                     <span class="text-gray-400 fw-semibold d-block">Perfect animation tool</span>
                  </div>
                  <!--end::Section-->
                  <!--begin::Section-->
                  <div class="d-flex align-items-center">
                     <span class="fw-bold text-gray-800 fs-5">$ 650</span>
                     <span class="text-muted mx-2">for</span>
                     <span class="fw-bold text-gray-800 fs-5 me-3">7</span>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Wrapper-->
               <!--begin::Pic-->
               <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                  <img src="{{asset('assets/media/stock/600x400/img-21.jpg')}}" alt="" />
               </div>
               <!--end::Pic-->
            </div>
            <!--end::Item-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->
            <!--begin::Item-->
            <div class="d-flex flex-stack">
               <!--begin::Wrapper-->
               <div class="d-flex flex-column me-3">
                  <!--begin::Section-->
                  <div class="mb-3">
                     <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">Samsung</a>
                     <span class="text-gray-400 fw-semibold d-block">Profile info,Timeline etc</span>
                  </div>
                  <!--end::Section-->
                  <!--begin::Section-->
                  <div class="d-flex align-items-center">
                     <span class="fw-bold text-gray-800 fs-5">$ 720</span>
                     <span class="text-muted mx-2">for</span>
                     <span class="fw-bold text-gray-800 fs-5 me-3">6</span>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Wrapper-->
               <!--begin::Pic-->
               <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                  <img src="{{asset('assets/media/stock/600x400/img-34.jpg')}}" alt="" />
               </div>
               <!--end::Pic-->
            </div>
            <!--end::Item-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->
            <!--begin::Item-->
            <div class="d-flex flex-stack">
               <!--begin::Wrapper-->
               <div class="d-flex flex-column me-3">
                  <!--begin::Section-->
                  <div class="mb-3">
                     <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fs-4 fw-bold">$D Printer</a>
                     <span class="text-gray-400 fw-semibold d-block">Manfactoring unique objekts</span>
                  </div>
                  <!--end::Section-->
                  <!--begin::Section-->
                  <div class="d-flex align-items-center">
                     <span class="fw-bold text-gray-800 fs-5">$ 430</span>
                     <span class="text-muted mx-2">for</span>
                     <span class="fw-bold text-gray-800 fs-5 me-3">8</span>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon-success btn-icon w-25px h-25px me-2">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr090.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                     <a href="#" class="btn btn-sm btn-light-success btn-icon w-25px h-25px">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-4">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                              <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </a>
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Wrapper-->
               <!--begin::Pic-->
               <div class="symbol symbol-70px symbol-2by3 flex-shrink-0">
                  <img src="assets/media/stock/600x400/img-27.jpg" alt="" />
               </div>
               <!--end::Pic-->
            </div>
            <!--end::Item-->
         </div>
         <!--end::Card body-->
         <!--begin::Card footer-->
         <div class="card-footer">
            <!--begin::Item-->
            <div class="d-flex flex-stack">
               <span class="fw-bold text-gray-600">Total</span>
               <span class="text-gray-800 fw-bolder fs-5">$ 1840.00</span>
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex flex-stack">
               <span class="fw-bold text-gray-600">Sub total</span>
               <span class="text-primary fw-bolder fs-5">$ 246.35</span>
            </div>
            <!--end::Item-->
            <!--end::Action-->
            <div class="d-flex justify-content-end mt-9">
               <a href="#" class="btn btn-primary d-flex justify-content-end">Pleace Order</a>
            </div>
            <!--end::Action-->
         </div>
         <!--end::Card footer-->
      </div>
      <!--end::Messenger-->
   </div>
   <!--end::Chat drawer-->
   <!--end::Drawers-->
   <!--begin::Scrolltop-->
   <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
      <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
      <span class="svg-icon">
         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
         </svg>
      </span>
      <!--end::Svg Icon-->
   </div>
   <!--end::Scrolltop-->
   <!--begin::Modals-->
   <!--begin::Modal - Upgrade plan-->
   <div class="modal fade" id="kt_modal_upgrade_plan" tabindex="-1" aria-hidden="true">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-xl">
         <!--begin::Modal content-->
         <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header justify-content-end border-0 pb-0">
               <!--begin::Close-->
               <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
            <div class="modal-body pt-0 pb-15 px-5 px-xl-20">
               <!--begin::Heading-->
               <div class="mb-13 text-center">
                  <h1 class="mb-3">Upgrade a Plan</h1>
                  <div class="text-muted fw-semibold fs-5">If you need more info, please check
                     <a href="#" class="link-primary fw-bold">Pricing Guidelines</a>.
                  </div>
               </div>
               <!--end::Heading-->
               <!--begin::Plans-->
               <div class="d-flex flex-column">
                  <!--begin::Nav group-->
                  <div class="nav-group nav-group-outline mx-auto" data-kt-buttons="true">
                     <button class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3 me-2 active" data-kt-plan="month">Monthly</button>
                     <button class="btn btn-color-gray-400 btn-active btn-active-secondary px-6 py-3" data-kt-plan="annual">Annual</button>
                  </div>
                  <!--end::Nav group-->
                  <!--begin::Row-->
                  <div class="row mt-10">
                     <!--begin::Col-->
                     <div class="col-lg-6 mb-10 mb-lg-0">
                        <!--begin::Tabs-->
                        <div class="nav flex-column">
                           <!--begin::Tab link-->
                           <label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 active mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_startup">
                              <!--end::Description-->
                              <div class="d-flex align-items-center me-2">
                                 <!--begin::Radio-->
                                 <div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
                                    <input class="form-check-input" type="radio" name="plan" checked="checked" value="startup" />
                                 </div>
                                 <!--end::Radio-->
                                 <!--begin::Info-->
                                 <div class="flex-grow-1">
                                    <div class="d-flex align-items-center fs-2 fw-bold flex-wrap">Startup</div>
                                    <div class="fw-semibold opacity-75">Best for startups</div>
                                 </div>
                                 <!--end::Info-->
                              </div>
                              <!--end::Description-->
                              <!--begin::Price-->
                              <div class="ms-5">
                                 <span class="mb-2">$</span>
                                 <span class="fs-3x fw-bold" data-kt-plan-price-month="39" data-kt-plan-price-annual="399">39</span>
                                 <span class="fs-7 opacity-50">/
                                    <span data-kt-element="period">Mon</span></span>
                              </div>
                              <!--end::Price-->
                           </label>
                           <!--end::Tab link-->
                           <!--begin::Tab link-->
                           <label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_advanced">
                              <!--end::Description-->
                              <div class="d-flex align-items-center me-2">
                                 <!--begin::Radio-->
                                 <div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
                                    <input class="form-check-input" type="radio" name="plan" value="advanced" />
                                 </div>
                                 <!--end::Radio-->
                                 <!--begin::Info-->
                                 <div class="flex-grow-1">
                                    <div class="d-flex align-items-center fs-2 fw-bold flex-wrap">Advanced</div>
                                    <div class="fw-semibold opacity-75">Best for 100+ team size</div>
                                 </div>
                                 <!--end::Info-->
                              </div>
                              <!--end::Description-->
                              <!--begin::Price-->
                              <div class="ms-5">
                                 <span class="mb-2">$</span>
                                 <span class="fs-3x fw-bold" data-kt-plan-price-month="339" data-kt-plan-price-annual="3399">339</span>
                                 <span class="fs-7 opacity-50">/
                                    <span data-kt-element="period">Mon</span></span>
                              </div>
                              <!--end::Price-->
                           </label>
                           <!--end::Tab link-->
                           <!--begin::Tab link-->
                           <label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_enterprise">
                              <!--end::Description-->
                              <div class="d-flex align-items-center me-2">
                                 <!--begin::Radio-->
                                 <div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
                                    <input class="form-check-input" type="radio" name="plan" value="enterprise" />
                                 </div>
                                 <!--end::Radio-->
                                 <!--begin::Info-->
                                 <div class="flex-grow-1">
                                    <div class="d-flex align-items-center fs-2 fw-bold flex-wrap">Enterprise
                                       <span class="badge badge-light-success ms-2 py-2 px-3 fs-7">Popular</span>
                                    </div>
                                    <div class="fw-semibold opacity-75">Best value for 1000+ team</div>
                                 </div>
                                 <!--end::Info-->
                              </div>
                              <!--end::Description-->
                              <!--begin::Price-->
                              <div class="ms-5">
                                 <span class="mb-2">$</span>
                                 <span class="fs-3x fw-bold" data-kt-plan-price-month="999" data-kt-plan-price-annual="9999">999</span>
                                 <span class="fs-7 opacity-50">/
                                    <span data-kt-element="period">Mon</span></span>
                              </div>
                              <!--end::Price-->
                           </label>
                           <!--end::Tab link-->
                           <!--begin::Tab link-->
                           <label class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_custom">
                              <!--end::Description-->
                              <div class="d-flex align-items-center me-2">
                                 <!--begin::Radio-->
                                 <div class="form-check form-check-custom form-check-solid form-check-success flex-shrink-0 me-6">
                                    <input class="form-check-input" type="radio" name="plan" value="custom" />
                                 </div>
                                 <!--end::Radio-->
                                 <!--begin::Info-->
                                 <div class="flex-grow-1">
                                    <div class="d-flex align-items-center fs-2 fw-bold flex-wrap">Custom</div>
                                    <div class="fw-semibold opacity-75">Requet a custom license</div>
                                 </div>
                                 <!--end::Info-->
                              </div>
                              <!--end::Description-->
                              <!--begin::Price-->
                              <div class="ms-5">
                                 <a href="#" class="btn btn-sm btn-success">Contact Us</a>
                              </div>
                              <!--end::Price-->
                           </label>
                           <!--end::Tab link-->
                        </div>
                        <!--end::Tabs-->
                     </div>
                     <!--end::Col-->
                     <!--begin::Col-->
                     <div class="col-lg-6">
                        <!--begin::Tab content-->
                        <div class="tab-content rounded h-100 bg-light p-10">
                           <!--begin::Tab Pane-->
                           <div class="tab-pane fade show active" id="kt_upgrade_plan_startup">
                              <!--begin::Heading-->
                              <div class="pb-5">
                                 <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                 <div class="text-muted fw-semibold">Optimal for 10+ team size and new startup</div>
                              </div>
                              <!--end::Heading-->
                              <!--begin::Body-->
                              <div class="pt-1">
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Finance Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                    <span class="svg-icon svg-icon-1">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                          <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Accounting Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                    <span class="svg-icon svg-icon-1">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                          <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Network Platform</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                    <span class="svg-icon svg-icon-1">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                          <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center">
                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Unlimited Cloud Space</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                    <span class="svg-icon svg-icon-1">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                          <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                              </div>
                              <!--end::Body-->
                           </div>
                           <!--end::Tab Pane-->
                           <!--begin::Tab Pane-->
                           <div class="tab-pane fade" id="kt_upgrade_plan_advanced">
                              <!--begin::Heading-->
                              <div class="pb-5">
                                 <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                 <div class="text-muted fw-semibold">Optimal for 100+ team size and grown company</div>
                              </div>
                              <!--end::Heading-->
                              <!--begin::Body-->
                              <div class="pt-1">
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Network Platform</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                    <span class="svg-icon svg-icon-1">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                          <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center">
                                    <span class="fw-semibold fs-5 text-muted flex-grow-1">Unlimited Cloud Space</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                    <span class="svg-icon svg-icon-1">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                          <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                              </div>
                              <!--end::Body-->
                           </div>
                           <!--end::Tab Pane-->
                           <!--begin::Tab Pane-->
                           <div class="tab-pane fade" id="kt_upgrade_plan_enterprise">
                              <!--begin::Heading-->
                              <div class="pb-5">
                                 <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                 <div class="text-muted fw-semibold">Optimal for 1000+ team and enterpise</div>
                              </div>
                              <!--end::Heading-->
                              <!--begin::Body-->
                              <div class="pt-1">
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 10 Active Users</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Up to 30 Project Integrations</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Network Platform</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Cloud Space</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                              </div>
                              <!--end::Body-->
                           </div>
                           <!--end::Tab Pane-->
                           <!--begin::Tab Pane-->
                           <div class="tab-pane fade" id="kt_upgrade_plan_custom">
                              <!--begin::Heading-->
                              <div class="pb-5">
                                 <h2 class="fw-bold text-dark">What’s in Startup Plan?</h2>
                                 <div class="text-muted fw-semibold">Optimal for corporations</div>
                              </div>
                              <!--end::Heading-->
                              <!--begin::Body-->
                              <div class="pt-1">
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Users</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Project Integrations</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Analytics Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Finance Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Accounting Module</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center mb-7">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Network Platform</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                                 <!--begin::Item-->
                                 <div class="d-flex align-items-center">
                                    <span class="fw-semibold fs-5 text-gray-700 flex-grow-1">Unlimited Cloud Space</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                          <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                 </div>
                                 <!--end::Item-->
                              </div>
                              <!--end::Body-->
                           </div>
                           <!--end::Tab Pane-->
                        </div>
                        <!--end::Tab content-->
                     </div>
                     <!--end::Col-->
                  </div>
                  <!--end::Row-->
               </div>
               <!--end::Plans-->
               <!--begin::Actions-->
               <div class="d-flex flex-center flex-row-fluid pt-12">
                  <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" id="kt_modal_upgrade_plan_btn">
                     <!--begin::Indicator label-->
                     <span class="indicator-label">Upgrade Plan</span>
                     <!--end::Indicator label-->
                     <!--begin::Indicator progress-->
                     <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                     <!--end::Indicator progress-->
                  </button>
               </div>
               <!--end::Actions-->
            </div>
            <!--end::Modal body-->
         </div>
         <!--end::Modal content-->
      </div>
      <!--end::Modal dialog-->
   </div>
   <!--end::Modal - Upgrade plan-->
   <!--begin::Modal - Create App-->
   <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-900px">
         <!--begin::Modal content-->
         <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
               <!--begin::Modal title-->
               <h2>Create App</h2>
               <!--end::Modal title-->
               <!--begin::Close-->
               <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
            <div class="modal-body py-lg-10 px-lg-10">
               <!--begin::Stepper-->
               <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
                  <!--begin::Aside-->
                  <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                     <!--begin::Nav-->
                     <div class="stepper-nav ps-lg-10">
                        <!--begin::Step 1-->
                        <div class="stepper-item current" data-kt-stepper-element="nav">
                           <!--begin::Wrapper-->
                           <div class="stepper-wrapper">
                              <!--begin::Icon-->
                              <div class="stepper-icon w-40px h-40px">
                                 <i class="stepper-check fas fa-check"></i>
                                 <span class="stepper-number">1</span>
                              </div>
                              <!--end::Icon-->
                              <!--begin::Label-->
                              <div class="stepper-label">
                                 <h3 class="stepper-title">Details</h3>
                                 <div class="stepper-desc">Name your App</div>
                              </div>
                              <!--end::Label-->
                           </div>
                           <!--end::Wrapper-->
                           <!--begin::Line-->
                           <div class="stepper-line h-40px"></div>
                           <!--end::Line-->
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                           <!--begin::Wrapper-->
                           <div class="stepper-wrapper">
                              <!--begin::Icon-->
                              <div class="stepper-icon w-40px h-40px">
                                 <i class="stepper-check fas fa-check"></i>
                                 <span class="stepper-number">2</span>
                              </div>
                              <!--begin::Icon-->
                              <!--begin::Label-->
                              <div class="stepper-label">
                                 <h3 class="stepper-title">Frameworks</h3>
                                 <div class="stepper-desc">Define your app framework</div>
                              </div>
                              <!--begin::Label-->
                           </div>
                           <!--end::Wrapper-->
                           <!--begin::Line-->
                           <div class="stepper-line h-40px"></div>
                           <!--end::Line-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                           <!--begin::Wrapper-->
                           <div class="stepper-wrapper">
                              <!--begin::Icon-->
                              <div class="stepper-icon w-40px h-40px">
                                 <i class="stepper-check fas fa-check"></i>
                                 <span class="stepper-number">3</span>
                              </div>
                              <!--end::Icon-->
                              <!--begin::Label-->
                              <div class="stepper-label">
                                 <h3 class="stepper-title">Database</h3>
                                 <div class="stepper-desc">Select the app database type</div>
                              </div>
                              <!--end::Label-->
                           </div>
                           <!--end::Wrapper-->
                           <!--begin::Line-->
                           <div class="stepper-line h-40px"></div>
                           <!--end::Line-->
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                           <!--begin::Wrapper-->
                           <div class="stepper-wrapper">
                              <!--begin::Icon-->
                              <div class="stepper-icon w-40px h-40px">
                                 <i class="stepper-check fas fa-check"></i>
                                 <span class="stepper-number">4</span>
                              </div>
                              <!--end::Icon-->
                              <!--begin::Label-->
                              <div class="stepper-label">
                                 <h3 class="stepper-title">Billing</h3>
                                 <div class="stepper-desc">Provide payment details</div>
                              </div>
                              <!--end::Label-->
                           </div>
                           <!--end::Wrapper-->
                           <!--begin::Line-->
                           <div class="stepper-line h-40px"></div>
                           <!--end::Line-->
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div class="stepper-item mark-completed" data-kt-stepper-element="nav">
                           <!--begin::Wrapper-->
                           <div class="stepper-wrapper">
                              <!--begin::Icon-->
                              <div class="stepper-icon w-40px h-40px">
                                 <i class="stepper-check fas fa-check"></i>
                                 <span class="stepper-number">5</span>
                              </div>
                              <!--end::Icon-->
                              <!--begin::Label-->
                              <div class="stepper-label">
                                 <h3 class="stepper-title">Completed</h3>
                                 <div class="stepper-desc">Review and Submit</div>
                              </div>
                              <!--end::Label-->
                           </div>
                           <!--end::Wrapper-->
                        </div>
                        <!--end::Step 5-->
                     </div>
                     <!--end::Nav-->
                  </div>
                  <!--begin::Aside-->
                  <!--begin::Content-->
                  <div class="flex-row-fluid py-lg-5 px-lg-15">
                     <!--begin::Form-->
                     <form class="form" novalidate="novalidate" id="kt_modal_create_app_form">
                        <!--begin::Step 1-->
                        <div class="current" data-kt-stepper-element="content">
                           <div class="w-100">
                              <!--begin::Input group-->
                              <div class="fv-row mb-10">
                                 <!--begin::Label-->
                                 <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                    <span class="required">App Name</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                                 </label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" />
                                 <!--end::Input-->
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="fv-row">
                                 <!--begin::Label-->
                                 <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                    <span class="required">Category</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select your app category"></i>
                                 </label>
                                 <!--end::Label-->
                                 <!--begin:Options-->
                                 <div class="fv-row">
                                    <!--begin:Option-->
                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                       <!--begin:Label-->
                                       <span class="d-flex align-items-center me-2">
                                          <!--begin:Icon-->
                                          <span class="symbol symbol-50px me-6">
                                             <span class="symbol-label bg-light-primary">
                                                <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor" />
                                                      <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor" />
                                                   </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                             </span>
                                          </span>
                                          <!--end:Icon-->
                                          <!--begin:Info-->
                                          <span class="d-flex flex-column">
                                             <span class="fw-bold fs-6">Quick Online Courses</span>
                                             <span class="fs-7 text-muted">Creating a clear text structure is just one SEO</span>
                                          </span>
                                          <!--end:Info-->
                                       </span>
                                       <!--end:Label-->
                                       <!--begin:Input-->
                                       <span class="form-check form-check-custom form-check-solid">
                                          <input class="form-check-input" type="radio" name="category" value="1" />
                                       </span>
                                       <!--end:Input-->
                                    </label>
                                    <!--end::Option-->
                                    <!--begin:Option-->
                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                       <!--begin:Label-->
                                       <span class="d-flex align-items-center me-2">
                                          <!--begin:Icon-->
                                          <span class="symbol symbol-50px me-6">
                                             <span class="symbol-label bg-light-danger">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                                      <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                                      <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                                      <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                                   </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                             </span>
                                          </span>
                                          <!--end:Icon-->
                                          <!--begin:Info-->
                                          <span class="d-flex flex-column">
                                             <span class="fw-bold fs-6">Face to Face Discussions</span>
                                             <span class="fs-7 text-muted">Creating a clear text structure is just one aspect</span>
                                          </span>
                                          <!--end:Info-->
                                       </span>
                                       <!--end:Label-->
                                       <!--begin:Input-->
                                       <span class="form-check form-check-custom form-check-solid">
                                          <input class="form-check-input" type="radio" name="category" value="2" />
                                       </span>
                                       <!--end:Input-->
                                    </label>
                                    <!--end::Option-->
                                    <!--begin:Option-->
                                    <label class="d-flex flex-stack cursor-pointer">
                                       <!--begin:Label-->
                                       <span class="d-flex align-items-center me-2">
                                          <!--begin:Icon-->
                                          <span class="symbol symbol-50px me-6">
                                             <span class="symbol-label bg-light-success">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path opacity="0.3" d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z" fill="currentColor" />
                                                      <path d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z" fill="currentColor" />
                                                   </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                             </span>
                                          </span>
                                          <!--end:Icon-->
                                          <!--begin:Info-->
                                          <span class="d-flex flex-column">
                                             <span class="fw-bold fs-6">Full Intro Training</span>
                                             <span class="fs-7 text-muted">Creating a clear text structure copywriting</span>
                                          </span>
                                          <!--end:Info-->
                                       </span>
                                       <!--end:Label-->
                                       <!--begin:Input-->
                                       <span class="form-check form-check-custom form-check-solid">
                                          <input class="form-check-input" type="radio" name="category" value="3" />
                                       </span>
                                       <!--end:Input-->
                                    </label>
                                    <!--end::Option-->
                                 </div>
                                 <!--end:Options-->
                              </div>
                              <!--end::Input group-->
                           </div>
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div data-kt-stepper-element="content">
                           <div class="w-100">
                              <!--begin::Input group-->
                              <div class="fv-row">
                                 <!--begin::Label-->
                                 <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                    <span class="required">Select Framework</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your apps framework"></i>
                                 </label>
                                 <!--end::Label-->
                                 <!--begin:Option-->
                                 <label class="d-flex flex-stack cursor-pointer mb-5">
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center me-2">
                                       <!--begin:Icon-->
                                       <span class="symbol symbol-50px me-6">
                                          <span class="symbol-label bg-light-warning">
                                             <i class="fab fa-html5 text-warning fs-2x"></i>
                                          </span>
                                       </span>
                                       <!--end:Icon-->
                                       <!--begin:Info-->
                                       <span class="d-flex flex-column">
                                          <span class="fw-bold fs-6">HTML5</span>
                                          <span class="fs-7 text-muted">Base Web Projec</span>
                                       </span>
                                       <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid">
                                       <input class="form-check-input" type="radio" checked="checked" name="framework" value="1" />
                                    </span>
                                    <!--end:Input-->
                                 </label>
                                 <!--end::Option-->
                                 <!--begin:Option-->
                                 <label class="d-flex flex-stack cursor-pointer mb-5">
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center me-2">
                                       <!--begin:Icon-->
                                       <span class="symbol symbol-50px me-6">
                                          <span class="symbol-label bg-light-success">
                                             <i class="fab fa-react text-success fs-2x"></i>
                                          </span>
                                       </span>
                                       <!--end:Icon-->
                                       <!--begin:Info-->
                                       <span class="d-flex flex-column">
                                          <span class="fw-bold fs-6">ReactJS</span>
                                          <span class="fs-7 text-muted">Robust and flexible app framework</span>
                                       </span>
                                       <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid">
                                       <input class="form-check-input" type="radio" name="framework" value="2" />
                                    </span>
                                    <!--end:Input-->
                                 </label>
                                 <!--end::Option-->
                                 <!--begin:Option-->
                                 <label class="d-flex flex-stack cursor-pointer mb-5">
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center me-2">
                                       <!--begin:Icon-->
                                       <span class="symbol symbol-50px me-6">
                                          <span class="symbol-label bg-light-danger">
                                             <i class="fab fa-angular text-danger fs-2x"></i>
                                          </span>
                                       </span>
                                       <!--end:Icon-->
                                       <!--begin:Info-->
                                       <span class="d-flex flex-column">
                                          <span class="fw-bold fs-6">Angular</span>
                                          <span class="fs-7 text-muted">Powerful data mangement</span>
                                       </span>
                                       <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid">
                                       <input class="form-check-input" type="radio" name="framework" value="3" />
                                    </span>
                                    <!--end:Input-->
                                 </label>
                                 <!--end::Option-->
                                 <!--begin:Option-->
                                 <label class="d-flex flex-stack cursor-pointer">
                                    <!--begin:Label-->
                                    <span class="d-flex align-items-center me-2">
                                       <!--begin:Icon-->
                                       <span class="symbol symbol-50px me-6">
                                          <span class="symbol-label bg-light-primary">
                                             <i class="fab fa-vuejs text-primary fs-2x"></i>
                                          </span>
                                       </span>
                                       <!--end:Icon-->
                                       <!--begin:Info-->
                                       <span class="d-flex flex-column">
                                          <span class="fw-bold fs-6">Vue</span>
                                          <span class="fs-7 text-muted">Lightweight and responsive framework</span>
                                       </span>
                                       <!--end:Info-->
                                    </span>
                                    <!--end:Label-->
                                    <!--begin:Input-->
                                    <span class="form-check form-check-custom form-check-solid">
                                       <input class="form-check-input" type="radio" name="framework" value="4" />
                                    </span>
                                    <!--end:Input-->
                                 </label>
                                 <!--end::Option-->
                              </div>
                              <!--end::Input group-->
                           </div>
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div data-kt-stepper-element="content">
                           <div class="w-100">
                              <!--begin::Input group-->
                              <div class="fv-row mb-10">
                                 <!--begin::Label-->
                                 <label class="required fs-5 fw-semibold mb-2">Database Name</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <input type="text" class="form-control form-control-lg form-control-solid" name="dbname" placeholder="" value="master_db" />
                                 <!--end::Input-->
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="fv-row">
                                 <!--begin::Label-->
                                 <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                    <span class="required">Select Database Engine</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select your app database engine"></i>
                                 </label>
                                 <!--end::Label-->
                                 <!--begin:Option-->
                                 <label class="d-flex flex-stack cursor-pointer mb-5">
                                    <!--begin::Label-->
                                    <span class="d-flex align-items-center me-2">
                                       <!--begin::Icon-->
                                       <span class="symbol symbol-50px me-6">
                                          <span class="symbol-label bg-light-success">
                                             <i class="fas fa-database text-success fs-2x"></i>
                                          </span>
                                       </span>
                                       <!--end::Icon-->
                                       <!--begin::Info-->
                                       <span class="d-flex flex-column">
                                          <span class="fw-bold fs-6">MySQL</span>
                                          <span class="fs-7 text-muted">Basic MySQL database</span>
                                       </span>
                                       <!--end::Info-->
                                    </span>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <span class="form-check form-check-custom form-check-solid">
                                       <input class="form-check-input" type="radio" name="dbengine" checked="checked" value="1" />
                                    </span>
                                    <!--end::Input-->
                                 </label>
                                 <!--end::Option-->
                                 <!--begin:Option-->
                                 <label class="d-flex flex-stack cursor-pointer mb-5">
                                    <!--begin::Label-->
                                    <span class="d-flex align-items-center me-2">
                                       <!--begin::Icon-->
                                       <span class="symbol symbol-50px me-6">
                                          <span class="symbol-label bg-light-danger">
                                             <i class="fab fa-google text-danger fs-2x"></i>
                                          </span>
                                       </span>
                                       <!--end::Icon-->
                                       <!--begin::Info-->
                                       <span class="d-flex flex-column">
                                          <span class="fw-bold fs-6">Firebase</span>
                                          <span class="fs-7 text-muted">Google based app data management</span>
                                       </span>
                                       <!--end::Info-->
                                    </span>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <span class="form-check form-check-custom form-check-solid">
                                       <input class="form-check-input" type="radio" name="dbengine" value="2" />
                                    </span>
                                    <!--end::Input-->
                                 </label>
                                 <!--end::Option-->
                                 <!--begin:Option-->
                                 <label class="d-flex flex-stack cursor-pointer">
                                    <!--begin::Label-->
                                    <span class="d-flex align-items-center me-2">
                                       <!--begin::Icon-->
                                       <span class="symbol symbol-50px me-6">
                                          <span class="symbol-label bg-light-warning">
                                             <i class="fab fa-amazon text-warning fs-2x"></i>
                                          </span>
                                       </span>
                                       <!--end::Icon-->
                                       <!--begin::Info-->
                                       <span class="d-flex flex-column">
                                          <span class="fw-bold fs-6">DynamoDB</span>
                                          <span class="fs-7 text-muted">Amazon Fast NoSQL Database</span>
                                       </span>
                                       <!--end::Info-->
                                    </span>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <span class="form-check form-check-custom form-check-solid">
                                       <input class="form-check-input" type="radio" name="dbengine" value="3" />
                                    </span>
                                    <!--end::Input-->
                                 </label>
                                 <!--end::Option-->
                              </div>
                              <!--end::Input group-->
                           </div>
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div data-kt-stepper-element="content">
                           <div class="w-100">
                              <!--begin::Input group-->
                              <div class="d-flex flex-column mb-7 fv-row">
                                 <!--begin::Label-->
                                 <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Name On Card</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a card holder's name"></i>
                                 </label>
                                 <!--end::Label-->
                                 <input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe" />
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="d-flex flex-column mb-7 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-6 fw-semibold form-label mb-2">Card Number</label>
                                 <!--end::Label-->
                                 <!--begin::Input wrapper-->
                                 <div class="position-relative">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />
                                    <!--end::Input-->
                                    <!--begin::Card logos-->
                                    <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                       <img src="assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
                                       <img src="assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px" />
                                       <img src="assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" />
                                    </div>
                                    <!--end::Card logos-->
                                 </div>
                                 <!--end::Input wrapper-->
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="row mb-10">
                                 <!--begin::Col-->
                                 <div class="col-md-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold form-label mb-2">Expiration Date</label>
                                    <!--end::Label-->
                                    <!--begin::Row-->
                                    <div class="row fv-row">
                                       <!--begin::Col-->
                                       <div class="col-6">
                                          <select name="card_expiry_month" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Month">
                                             <option></option>
                                             <option value="1">1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4">4</option>
                                             <option value="5">5</option>
                                             <option value="6">6</option>
                                             <option value="7">7</option>
                                             <option value="8">8</option>
                                             <option value="9">9</option>
                                             <option value="10">10</option>
                                             <option value="11">11</option>
                                             <option value="12">12</option>
                                          </select>
                                       </div>
                                       <!--end::Col-->
                                       <!--begin::Col-->
                                       <div class="col-6">
                                          <select name="card_expiry_year" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Year">
                                             <option></option>
                                             <option value="2023">2023</option>
                                             <option value="2024">2024</option>
                                             <option value="2025">2025</option>
                                             <option value="2026">2026</option>
                                             <option value="2027">2027</option>
                                             <option value="2028">2028</option>
                                             <option value="2029">2029</option>
                                             <option value="2030">2030</option>
                                             <option value="2031">2031</option>
                                             <option value="2032">2032</option>
                                             <option value="2033">2033</option>
                                          </select>
                                       </div>
                                       <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                 </div>
                                 <!--end::Col-->
                                 <!--begin::Col-->
                                 <div class="col-md-4 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                       <span class="required">CVV</span>
                                       <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Enter a card CVV code"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative">
                                       <!--begin::Input-->
                                       <input type="text" class="form-control form-control-solid" minlength="3" maxlength="4" placeholder="CVV" name="card_cvv" />
                                       <!--end::Input-->
                                       <!--begin::CVV icon-->
                                       <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                          <!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
                                          <span class="svg-icon svg-icon-2hx">
                                             <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 7H2V11H22V7Z" fill="currentColor" />
                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor" />
                                             </svg>
                                          </span>
                                          <!--end::Svg Icon-->
                                       </div>
                                       <!--end::CVV icon-->
                                    </div>
                                    <!--end::Input wrapper-->
                                 </div>
                                 <!--end::Col-->
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="d-flex flex-stack">
                                 <!--begin::Label-->
                                 <div class="me-5">
                                    <label class="fs-6 fw-semibold form-label">Save Card for further billing?</label>
                                    <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div>
                                 </div>
                                 <!--end::Label-->
                                 <!--begin::Switch-->
                                 <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                    <span class="form-check-label fw-semibold text-muted">Save Card</span>
                                 </label>
                                 <!--end::Switch-->
                              </div>
                              <!--end::Input group-->
                           </div>
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div data-kt-stepper-element="content">
                           <div class="w-100 text-center">
                              <!--begin::Heading-->
                              <h1 class="fw-bold text-dark mb-3">Release!</h1>
                              <!--end::Heading-->
                              <!--begin::Description-->
                              <div class="text-muted fw-semibold fs-3">Submit your app to kickstart your project.</div>
                              <!--end::Description-->
                              <!--begin::Illustration-->
                              <div class="text-center px-4 py-15">
                                 <img src="assets/media/illustrations/sketchy-1/9.png" alt="" class="mw-100 mh-300px" />
                              </div>
                              <!--end::Illustration-->
                           </div>
                        </div>
                        <!--end::Step 5-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-10">
                           <!--begin::Wrapper-->
                           <div class="me-2">
                              <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                 <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                 <span class="svg-icon svg-icon-3 me-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                       <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                    </svg>
                                 </span>
                                 <!--end::Svg Icon-->Back</button>
                           </div>
                           <!--end::Wrapper-->
                           <!--begin::Wrapper-->
                           <div>
                              <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                 <span class="indicator-label">Submit
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-3 ms-2 me-0">
                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                          <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                    <!--end::Svg Icon--></span>
                                 <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                              </button>
                              <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                                 <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                 <span class="svg-icon svg-icon-3 ms-1 me-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                       <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                    </svg>
                                 </span>
                                 <!--end::Svg Icon--></button>
                           </div>
                           <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                     </form>
                     <!--end::Form-->
                  </div>
                  <!--end::Content-->
               </div>
               <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
         </div>
         <!--end::Modal content-->
      </div>
      <!--end::Modal dialog-->
   </div>
   <!--end::Modal - Create App-->
   <!--begin::Modal - New Target-->
   <div class="modal fade" id="kt_modal_bidding" tabindex="-1" aria-hidden="true">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-650px">
         <!--begin::Modal content-->
         <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
               <!--begin::Close-->
               <div class="btn btn-sm btn-icon btn-active-color-primary" data-kt-modal-action-type="close">
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
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
               <!--begin:Form-->
               <form id="kt_modal_bidding_form" class="form" action="#">
                  <!--begin::Heading-->
                  <div class="mb-13 text-center">
                     <!--begin::Title-->
                     <h1 class="mb-3">Place your bids</h1>
                     <!--end::Title-->
                     <!--begin::Description-->
                     <div class="text-muted fw-semibold fs-5">If you need more info, please check
                        <a href="#" class="fw-bold link-primary">Bidding Guidelines</a>.
                     </div>
                     <!--end::Description-->
                  </div>
                  <!--end::Heading-->
                  <!--begin::Input group-->
                  <div class="d-flex flex-column mb-8 fv-row">
                     <!--begin::Label-->
                     <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Bid Amount</span>
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify the bid amount to place in."></i>
                     </label>
                     <!--end::Label-->
                     <!--begin::Bid options-->
                     <div class="d-flex flex-stack gap-5 mb-3">
                        <button type="button" class="btn btn-light-primary w-100" data-kt-modal-bidding="option">10</button>
                        <button type="button" class="btn btn-light-primary w-100" data-kt-modal-bidding="option">50</button>
                        <button type="button" class="btn btn-light-primary w-100" data-kt-modal-bidding="option">100</button>
                     </div>
                     <!--begin::Bid options-->
                     <input type="text" class="form-control form-control-solid" placeholder="Enter Bid Amount" name="bid_amount" />
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="fv-row mb-8">
                     <!--begin::Label-->
                     <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Currency Type</span>
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select the currency type."></i>
                     </label>
                     <!--end::Label-->
                     <!--begin::Select2-->
                     <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Currency Type" name="currency_type">
                        <option value=""></option>
                        <option value="dollar" selected="selected">Dollar</option>
                        <option value="crypto">Crypto</option>
                     </select>
                     <!--end::Select2-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="fv-row mb-8">
                     <!--begin::Label-->
                     <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span>Currency</span>
                     </label>
                     <!--end::Label-->
                     <!--begin::Dollar type-->
                     <div class="" data-kt-modal-bidding-type="dollar">
                        <!--begin::Select2-->
                        <select name="currency_dollar" aria-label="Select a Currency" data-placeholder="Select a currency.." class="form-select form-select-solid form-select-lg">
                           <option data-kt-bidding-modal-option-icon="flags/united-states.svg" value="USD" selected="selected">
                              <b>USD</b>&nbsp;-&nbsp;USA dollar
                           </option>
                           <option data-kt-bidding-modal-option-icon="flags/united-kingdom.svg" value="GBP">
                              <b>GBP</b>&nbsp;-&nbsp;British pound
                           </option>
                           <option data-kt-bidding-modal-option-icon="flags/australia.svg" value="AUD">
                              <b>AUD</b>&nbsp;-&nbsp;Australian dollar
                           </option>
                           <option data-kt-bidding-modal-option-icon="flags/japan.svg" value="JPY">
                              <b>JPY</b>&nbsp;-&nbsp;Japanese yen
                           </option>
                           <option data-kt-bidding-modal-option-icon="flags/sweden.svg" value="SEK">
                              <b>SEK</b>&nbsp;-&nbsp;Swedish krona
                           </option>
                           <option data-kt-bidding-modal-option-icon="flags/canada.svg" value="CAD">
                              <b>CAD</b>&nbsp;-&nbsp;Canadian dollar
                           </option>
                           <option data-kt-bidding-modal-option-icon="flags/switzerland.svg" value="CHF">
                              <b>CHF</b>&nbsp;-&nbsp;Swiss franc
                           </option>
                        </select>
                        <!--end::Select2-->
                     </div>
                     <!--end::Dollar type-->
                     <!--begin::Crypto type-->
                     <div class="d-none" data-kt-modal-bidding-type="crypto">
                        <!--begin::Select2-->
                        <select name="currency_crypto" aria-label="Select a Coin" data-placeholder="Select a currency.." class="form-select form-select-solid form-select-lg">
                           <option data-kt-bidding-modal-option-icon="svg/coins/bitcoin.svg" value="1" selected="selected">Bitcoin</option>
                           <option data-kt-bidding-modal-option-icon="svg/coins/binance.svg" value="2">Binance</option>
                           <option data-kt-bidding-modal-option-icon="svg/coins/chainlink.svg" value="3">Chainlink</option>
                           <option data-kt-bidding-modal-option-icon="svg/coins/coin.svg" value="4">Coin</option>
                           <option data-kt-bidding-modal-option-icon="svg/coins/ethereum.svg" value="5">Ethereum</option>
                           <option data-kt-bidding-modal-option-icon="svg/coins/filecoin.svg" value="6">Filecoin</option>
                        </select>
                        <!--end::Select2-->
                     </div>
                     <!--end::Crypto type-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Notice-->
                  <!--begin::Notice-->
                  <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                     <!--begin::Icon-->
                     <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                     <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="currentColor" />
                           <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="currentColor" />
                           <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="currentColor" />
                        </svg>
                     </span>
                     <!--end::Svg Icon-->
                     <!--end::Icon-->
                     <!--begin::Wrapper-->
                     <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-semibold">
                           <h4 class="text-gray-900 fw-bold">Top up funds</h4>
                           <div class="fs-6 text-gray-700">Not enough funds in your wallet?
                              <a href="../../demo1/dist/utilities/modals/wizards/top-up-wallet.html" class="text-bolder">Top up wallet</a>.
                           </div>
                        </div>
                        <!--end::Content-->
                     </div>
                     <!--end::Wrapper-->
                  </div>
                  <!--end::Notice-->
                  <!--end::Notice-->
                  <!--begin::Actions-->
                  <div class="text-center">
                     <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel">Cancel</button>
                     <button type="submit" class="btn btn-primary" data-kt-modal-action-type="submit">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                           <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                     </button>
                  </div>
                  <!--end::Actions-->
               </form>
               <!--end:Form-->
            </div>
            <!--end::Modal body-->
         </div>
         <!--end::Modal content-->
      </div>
      <!--end::Modal dialog-->
   </div>
   <!--end::Modal - New Target-->
   <!--begin::Modal - Users Search-->
   <div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-650px">
         <!--begin::Modal content-->
         <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
               <!--begin::Close-->
               <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
               <!--begin::Content-->
               <div class="text-center mb-13">
                  <h1 class="mb-3">Search Users</h1>
                  <div class="text-muted fw-semibold fs-5">Invite Collaborators To Your Project</div>
               </div>
               <!--end::Content-->
               <!--begin::Search-->
               <div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
                  <!--begin::Form-->
                  <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
                     <!--begin::Hidden input(Added to disable form autocomplete)-->
                     <input type="hidden" />
                     <!--end::Hidden input-->
                     <!--begin::Icon-->
                     <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                     <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                           <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                        </svg>
                     </span>
                     <!--end::Svg Icon-->
                     <!--end::Icon-->
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-lg form-control-solid px-15" name="search" value="" placeholder="Search by username, full name or email..." data-kt-search-element="input" />
                     <!--end::Input-->
                     <!--begin::Spinner-->
                     <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
                        <span class="spinner-border h-15px w-15px align-middle text-muted"></span>
                     </span>
                     <!--end::Spinner-->
                     <!--begin::Reset-->
                     <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none" data-kt-search-element="clear">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                              <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                     </span>
                     <!--end::Reset-->
                  </form>
                  <!--end::Form-->
                  <!--begin::Wrapper-->
                  <div class="py-5">
                     <!--begin::Suggestions-->
                     <div data-kt-search-element="suggestions">
                        <!--begin::Heading-->
                        <h3 class="fw-semibold mb-5">Recently searched:</h3>
                        <!--end::Heading-->
                        <!--begin::Users-->
                        <div class="mh-375px scroll-y me-n7 pe-7">
                           <!--begin::User-->
                           <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                              <!--begin::Avatar-->
                              <div class="symbol symbol-35px symbol-circle me-5">
                                 <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                              </div>
                              <!--end::Avatar-->
                              <!--begin::Info-->
                              <div class="fw-semibold">
                                 <span class="fs-6 text-gray-800 me-2">Emma Smith</span>
                                 <span class="badge badge-light">Art Director</span>
                              </div>
                              <!--end::Info-->
                           </a>
                           <!--end::User-->
                           <!--begin::User-->
                           <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                              <!--begin::Avatar-->
                              <div class="symbol symbol-35px symbol-circle me-5">
                                 <span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
                              </div>
                              <!--end::Avatar-->
                              <!--begin::Info-->
                              <div class="fw-semibold">
                                 <span class="fs-6 text-gray-800 me-2">Melody Macy</span>
                                 <span class="badge badge-light">Marketing Analytic</span>
                              </div>
                              <!--end::Info-->
                           </a>
                           <!--end::User-->
                           <!--begin::User-->
                           <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                              <!--begin::Avatar-->
                              <div class="symbol symbol-35px symbol-circle me-5">
                                 <img alt="Pic" src="{{asset('assets/media/avatars/300-1.jpg')}}" />
                              </div>
                              <!--end::Avatar-->
                              <!--begin::Info-->
                              <div class="fw-semibold">
                                 <span class="fs-6 text-gray-800 me-2">Max Smith</span>
                                 <span class="badge badge-light">Software Enginer</span>
                              </div>
                              <!--end::Info-->
                           </a>
                           <!--end::User-->
                           <!--begin::User-->
                           <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                              <!--begin::Avatar-->
                              <div class="symbol symbol-35px symbol-circle me-5">
                                 <img alt="Pic" src="assets/media/avatars/300-5.jpg" />
                              </div>
                              <!--end::Avatar-->
                              <!--begin::Info-->
                              <div class="fw-semibold">
                                 <span class="fs-6 text-gray-800 me-2">Sean Bean</span>
                                 <span class="badge badge-light">Web Developer</span>
                              </div>
                              <!--end::Info-->
                           </a>
                           <!--end::User-->
                           <!--begin::User-->
                           <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                              <!--begin::Avatar-->
                              <div class="symbol symbol-35px symbol-circle me-5">
                                 <img alt="Pic" src="{{asset('assets/media/avatars/300-25.jpg')}}" />
                              </div>
                              <!--end::Avatar-->
                              <!--begin::Info-->
                              <div class="fw-semibold">
                                 <span class="fs-6 text-gray-800 me-2">Brian Cox</span>
                                 <span class="badge badge-light">UI/UX Designer</span>
                              </div>
                              <!--end::Info-->
                           </a>
                           <!--end::User-->
                        </div>
                        <!--end::Users-->
                     </div>
                     <!--end::Suggestions-->
                     <!--begin::Results(add d-none to below element to hide the users list by default)-->
                     <div data-kt-search-element="results" class="d-none">
                        <!--begin::Users-->
                        <div class="mh-375px scroll-y me-n7 pe-7">
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='0']" value="0" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Smith</a>
                                    <div class="fw-semibold text-muted">smith@kpmg.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2" selected="selected">Owner</option>
                                    <option value="3">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='1']" value="1" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody Macy</a>
                                    <div class="fw-semibold text-muted">melody@altbox.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1" selected="selected">Guest</option>
                                    <option value="2">Owner</option>
                                    <option value="3">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='2']" value="2" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="{{asset('assets/media/avatars/300-1.jpg')}}" />
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Max Smith</a>
                                    <div class="fw-semibold text-muted">max@kt.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2">Owner</option>
                                    <option value="3" selected="selected">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='3']" value="3" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-5.jpg" />
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Sean Bean</a>
                                    <div class="fw-semibold text-muted">sean@dellito.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2" selected="selected">Owner</option>
                                    <option value="3">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='4']" value="4" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="{{asset('assets/media/avatars/300-25.jpg')}}" />
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Brian Cox</a>
                                    <div class="fw-semibold text-muted">brian@exchange.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2">Owner</option>
                                    <option value="3" selected="selected">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='5']" value="5" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <span class="symbol-label bg-light-warning text-warning fw-semibold">C</span>
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela Collins</a>
                                    <div class="fw-semibold text-muted">mik@pex.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2" selected="selected">Owner</option>
                                    <option value="3">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='6']" value="6" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-9.jpg" />
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Francis Mitcham</a>
                                    <div class="fw-semibold text-muted">f.mit@kpmg.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2">Owner</option>
                                    <option value="3" selected="selected">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='7']" value="7" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Olivia Wild</a>
                                    <div class="fw-semibold text-muted">olivia@corpmail.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2" selected="selected">Owner</option>
                                    <option value="3">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='8']" value="8" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <span class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil Owen</a>
                                    <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1" selected="selected">Guest</option>
                                    <option value="2">Owner</option>
                                    <option value="3">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='9']" value="9" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-23.jpg" />
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
                                    <div class="fw-semibold text-muted">dam@consilting.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2">Owner</option>
                                    <option value="3" selected="selected">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='10']" value="10" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Bold</a>
                                    <div class="fw-semibold text-muted">emma@intenso.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2" selected="selected">Owner</option>
                                    <option value="3">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='11']" value="11" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ana Crown</a>
                                    <div class="fw-semibold text-muted">ana.cf@limtel.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1" selected="selected">Guest</option>
                                    <option value="2">Owner</option>
                                    <option value="3">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='12']" value="12" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <span class="symbol-label bg-light-info text-info fw-semibold">A</span>
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Robert Doe</a>
                                    <div class="fw-semibold text-muted">robert@benko.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2">Owner</option>
                                    <option value="3" selected="selected">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='13']" value="13" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-13.jpg" />
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">John Miller</a>
                                    <div class="fw-semibold text-muted">miller@mapple.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2">Owner</option>
                                    <option value="3" selected="selected">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='14']" value="14" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <span class="symbol-label bg-light-success text-success fw-semibold">L</span>
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>
                                    <div class="fw-semibold text-muted">lucy.m@fentech.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2" selected="selected">Owner</option>
                                    <option value="3">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='15']" value="15" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/300-21.jpg" />
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ethan Wilder</a>
                                    <div class="fw-semibold text-muted">ethan@loop.com.au</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1" selected="selected">Guest</option>
                                    <option value="2">Owner</option>
                                    <option value="3">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                           <!--begin::Separator-->
                           <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                           <!--end::Separator-->
                           <!--begin::User-->
                           <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16">
                              <!--begin::Details-->
                              <div class="d-flex align-items-center">
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='16']" value="16" />
                                 </label>
                                 <!--end::Checkbox-->
                                 <!--begin::Avatar-->
                                 <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="{{asset('assets/media/avatars/300-1.jpg')}}" />
                                 </div>
                                 <!--end::Avatar-->
                                 <!--begin::Details-->
                                 <div class="ms-5">
                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Max Smith</a>
                                    <div class="fw-semibold text-muted">max@kt.com</div>
                                 </div>
                                 <!--end::Details-->
                              </div>
                              <!--end::Details-->
                              <!--begin::Access menu-->
                              <div class="ms-2 w-100px">
                                 <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true">
                                    <option value="1">Guest</option>
                                    <option value="2">Owner</option>
                                    <option value="3" selected="selected">Can Edit</option>
                                 </select>
                              </div>
                              <!--end::Access menu-->
                           </div>
                           <!--end::User-->
                        </div>
                        <!--end::Users-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-center mt-15">
                           <button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">Cancel</button>
                           <button type="submit" id="kt_modal_users_search_submit" class="btn btn-primary">Add Selected Users</button>
                        </div>
                        <!--end::Actions-->
                     </div>
                     <!--end::Results-->
                     <!--begin::Empty-->
                     <div data-kt-search-element="empty" class="text-center d-none">
                        <!--begin::Message-->
                        <div class="fw-semibold py-10">
                           <div class="text-gray-600 fs-3 mb-2">No users found</div>
                           <div class="text-muted fs-6">Try to search by username, full name or email...</div>
                        </div>
                        <!--end::Message-->
                        <!--begin::Illustration-->
                        <div class="text-center px-5">
                           <img src="assets/media/illustrations/sketchy-1/1.png" alt="" class="w-100 h-200px h-sm-325px" />
                        </div>
                        <!--end::Illustration-->
                     </div>
                     <!--end::Empty-->
                  </div>
                  <!--end::Wrapper-->
               </div>
               <!--end::Search-->
            </div>
            <!--end::Modal body-->
         </div>
         <!--end::Modal content-->
      </div>
      <!--end::Modal dialog-->
   </div>
   <!--end::Modal - Users Search-->
   <!--begin::Modal - Invite Friends-->
   <div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">
      <!--begin::Modal dialog-->
      <div class="modal-dialog mw-650px">
         <!--begin::Modal content-->
         <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
               <!--begin::Close-->
               <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
               <!--begin::Heading-->
               <div class="text-center mb-13">
                  <!--begin::Title-->
                  <h1 class="mb-3">Invite a Friend</h1>
                  <!--end::Title-->
                  <!--begin::Description-->
                  <div class="text-muted fw-semibold fs-5">If you need more info, please check out
                     <a href="#" class="link-primary fw-bold">FAQ Page</a>.
                  </div>
                  <!--end::Description-->
               </div>
               <!--end::Heading-->
               <!--begin::Google Contacts Invite-->
               <div class="btn btn-light-primary fw-bold w-100 mb-8">
                  <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Invite Gmail Contacts
               </div>
               <!--end::Google Contacts Invite-->
               <!--begin::Separator-->
               <div class="separator d-flex flex-center mb-8">
                  <span class="text-uppercase bg-body fs-7 fw-semibold text-muted px-3">or</span>
               </div>
               <!--end::Separator-->
               <!--begin::Textarea-->
               <textarea class="form-control form-control-solid mb-8" rows="3" placeholder="Type or paste emails here"></textarea>
               <!--end::Textarea-->
               <!--begin::Users-->
               <div class="mb-10">
                  <!--begin::Heading-->
                  <div class="fs-6 fw-semibold mb-2">Your Invitations</div>
                  <!--end::Heading-->
                  <!--begin::List-->
                  <div class="mh-300px scroll-y me-n7 pe-7">
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Smith</a>
                              <div class="fw-semibold text-muted">smith@kpmg.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2" selected="selected">Owner</option>
                              <option value="3">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody Macy</a>
                              <div class="fw-semibold text-muted">melody@altbox.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1" selected="selected">Guest</option>
                              <option value="2">Owner</option>
                              <option value="3">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <img alt="Pic" src="{{asset('assets/media/avatars/300-1.jpg')}}" />
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Max Smith</a>
                              <div class="fw-semibold text-muted">max@kt.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2">Owner</option>
                              <option value="3" selected="selected">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <img alt="Pic" src="assets/media/avatars/300-5.jpg" />
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Sean Bean</a>
                              <div class="fw-semibold text-muted">sean@dellito.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2" selected="selected">Owner</option>
                              <option value="3">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <img alt="Pic" src="{{asset('assets/media/avatars/300-25.jpg')}}" />
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Brian Cox</a>
                              <div class="fw-semibold text-muted">brian@exchange.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2">Owner</option>
                              <option value="3" selected="selected">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <span class="symbol-label bg-light-warning text-warning fw-semibold">C</span>
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela Collins</a>
                              <div class="fw-semibold text-muted">mik@pex.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2" selected="selected">Owner</option>
                              <option value="3">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <img alt="Pic" src="assets/media/avatars/300-9.jpg" />
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Francis Mitcham</a>
                              <div class="fw-semibold text-muted">f.mit@kpmg.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2">Owner</option>
                              <option value="3" selected="selected">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <span class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Olivia Wild</a>
                              <div class="fw-semibold text-muted">olivia@corpmail.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2" selected="selected">Owner</option>
                              <option value="3">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <span class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil Owen</a>
                              <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1" selected="selected">Guest</option>
                              <option value="2">Owner</option>
                              <option value="3">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <img alt="Pic" src="assets/media/avatars/300-23.jpg" />
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
                              <div class="fw-semibold text-muted">dam@consilting.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2">Owner</option>
                              <option value="3" selected="selected">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Bold</a>
                              <div class="fw-semibold text-muted">emma@intenso.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2" selected="selected">Owner</option>
                              <option value="3">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ana Crown</a>
                              <div class="fw-semibold text-muted">ana.cf@limtel.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1" selected="selected">Guest</option>
                              <option value="2">Owner</option>
                              <option value="3">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <span class="symbol-label bg-light-info text-info fw-semibold">A</span>
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Robert Doe</a>
                              <div class="fw-semibold text-muted">robert@benko.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2">Owner</option>
                              <option value="3" selected="selected">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <img alt="Pic" src="assets/media/avatars/300-13.jpg" />
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">John Miller</a>
                              <div class="fw-semibold text-muted">miller@mapple.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2">Owner</option>
                              <option value="3" selected="selected">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <span class="symbol-label bg-light-success text-success fw-semibold">L</span>
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>
                              <div class="fw-semibold text-muted">lucy.m@fentech.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2" selected="selected">Owner</option>
                              <option value="3">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <img alt="Pic" src="assets/media/avatars/300-21.jpg" />
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ethan Wilder</a>
                              <div class="fw-semibold text-muted">ethan@loop.com.au</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1" selected="selected">Guest</option>
                              <option value="2">Owner</option>
                              <option value="3">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                     <!--begin::User-->
                     <div class="d-flex flex-stack py-4">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                           <!--begin::Avatar-->
                           <div class="symbol symbol-35px symbol-circle">
                              <span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
                           </div>
                           <!--end::Avatar-->
                           <!--begin::Details-->
                           <div class="ms-5">
                              <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Bold</a>
                              <div class="fw-semibold text-muted">emma@intenso.com</div>
                           </div>
                           <!--end::Details-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Access menu-->
                        <div class="ms-2 w-100px">
                           <select class="form-select form-select-solid form-select-sm" data-control="select2" data-dropdown-parent="#kt_modal_invite_friends" data-hide-search="true">
                              <option value="1">Guest</option>
                              <option value="2">Owner</option>
                              <option value="3" selected="selected">Can Edit</option>
                           </select>
                        </div>
                        <!--end::Access menu-->
                     </div>
                     <!--end::User-->
                  </div>
                  <!--end::List-->
               </div>
               <!--end::Users-->
               <!--begin::Notice-->
               <div class="d-flex flex-stack">
                  <!--begin::Label-->
                  <div class="me-5 fw-semibold">
                     <label class="fs-6">Adding Users by Team Members</label>
                     <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                  </div>
                  <!--end::Label-->
                  <!--begin::Switch-->
                  <label class="form-check form-switch form-check-custom form-check-solid">
                     <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                     <span class="form-check-label fw-semibold text-muted">Allowed</span>
                  </label>
                  <!--end::Switch-->
               </div>
               <!--end::Notice-->
            </div>
            <!--end::Modal body-->
         </div>
         <!--end::Modal content-->
      </div>
      <!--end::Modal dialog-->
   </div>
   <!--end::Modal - Invite Friend-->
   <!--end::Modals-->
   <!--begin::Javascript-->
   <script>
      var hostUrl = "assets/";
   </script>
   <!--begin::Global Javascript Bundle(mandatory for all pages)-->
   <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
   <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
   <!--end::Global Javascript Bundle-->
   <!--begin::Vendors Javascript(used for this page only)-->
   <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
   <script src="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
   @if(Route::current()->getName() === 'menu')
   <script src="{{asset('assets/js/custom/apps/user-management/permissions/list.js')}}"></script>
   <script src="{{asset('assets/js/custom/apps/user-management/permissions/add-permission.js')}}"></script>
   <script src="{{asset('assets/js/custom/apps/user-management/permissions/update-permission.js')}}"></script>
   @endif
   @if(Route::current()->getName() === 'role')
   <script src="{{asset('assets/js/custom/apps/user-management/roles/list/add.js')}}"></script>
   <script src="{{asset('assets/js/custom/apps/user-management/roles/list/update-role.js')}}"></script>
   @endif
   @if(Route::current()->getName() === 'organization')
   <script src="{{asset('assets/js/custom/apps/customers/list/export.js')}}"></script>
   <script src="{{asset('assets/js/custom/apps/customers/list/list.js')}}"></script>
   <script src="{{asset('assets/js/custom/apps/customers/add.js')}}"></script>
   @endif
   @if(Route::current()->getName() === 'user')
   <script src="{{asset('assets/js/custom/apps/user-management/users/list/table.js')}}"></script>
   <script src="{{asset('assets/js/custom/apps/user-management/users/list/export-users.js')}}"></script>
   <script src="{{asset('assets/js/custom/apps/user-management/users/list/add.js')}}"></script>
   @endif
   @if(Route::current()->getName() === 'feed')
   <script src="{{asset('assets/js/custom/apps/feed/list/export.js')}}"></script>
   <script src="{{asset('assets/js/custom/apps/feed/list/list.js')}}"></script>
   <script src="{{asset('assets/js/custom/apps/feed/add.js')}}"></script>
   @endif
   <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
   <!--end::Vendors Javascript-->
   <!--begin::Custom Javascript(used for this page only)-->
   <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
   <script src="{{asset('assets/js/custom/widgets.js')}}"></script>
   <script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
   <script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
   <script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
   <script src="{{asset('assets/js/custom/utilities/modals/bidding.js')}}"></script>
   <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
   <!--end::Javascript-->
</body>
<!--end::Body-->

</html>